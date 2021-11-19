<?php

namespace App\Http\Controllers;

use App\Models\ArticleMethod;
use Illuminate\Http\Request;

class ArticleMethodController extends Controller
{

    public function getArticleMethods(Request $request)
    {
        $articleMethods = ArticleMethod::where(['articleId' => $request->articleId, 'partId' => $request->partId])->get();
        return view('pages.associated_methods', compact('articleMethods'));
    }

    public function getArticleMethodsSummary()
    {

    }

    public function addArticleMethod()
    {

    }

    public function deleteArticleMethod()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request()->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        $articleMethod = new ArticleMethod;
        $articleMethod->articleId = $request->articleId;
        $articleMethod->number = $request->number;
        $articleMethod->partId = $request->partId;
        $articleMethod->title = $request->title;
        $articleMethod->description = $request->description;
        $articleMethod->note = $request->note;

        if ($request->file('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $extension;
            $image->move('uploads/articles/methods/', $imageName);
        }

        $articleMethod->image = $imageName;
        $articleMethod->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArticleMethod  $articleMethod
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleMethod $articleMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArticleMethod  $articleMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(ArticleMethod $articleMethod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ArticleMethod  $articleMethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArticleMethod $articleMethod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArticleMethod  $articleMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleMethod $articleMethod)
    {
        //
    }
}