<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Article;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::count();
        $categories = Category::count();
        $articles = Article::count();
        $latestArticles = Article::orderBy('created_at', 'desc')->limit(10)->get();
        return view('dashboard', compact('users', 'categories', 'articles', 'latestArticles'));;
    }
}
