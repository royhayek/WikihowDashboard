<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Auth::routes();

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

Route::resource('category', 'App\Http\Controllers\CategoryController');
Route::resource('article', 'App\Http\Controllers\ArticleController');
Route::resource('settings', 'App\Http\Controllers\SettingsController');
Route::resource('articlemethod', 'App\Http\Controllers\ArticleMethodController');
Route::resource('articlemethodpart', 'App\Http\Controllers\ArticleMethodPartController');

Route::get('/getArticleMethodParts', 'App\Http\Controllers\ArticleMethodPartController@getArticleMethodParts')->name('getArticleMethodParts');
Route::get('/getArticleMethods', 'App\Http\Controllers\ArticleMethodController@getArticleMethods')->name('getArticleMethods');
Route::get('/getArticleMethodsSummary', 'App\Http\Controllers\ArticleMethodController@getArticleMethodsSummary')->name('getArticleMethodsSummary');
Route::post('article/method/delete', 'App\Http\Controllers\ArticleMethodController@deleteArticleMethod')->name('articlemethod.delete');
Route::post('article/method/part/delete', 'App\Http\Controllers\ArticleMethodPartController@deleteArticleMethodPart')->name('articlemethodpart.delete');
Route::get('showMethodForm/{articleId}/{partId}', 'App\Http\Controllers\ArticleMethodPartController@showMethodForm');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});