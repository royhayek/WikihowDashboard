<?php

namespace App\Http\Controllers;

use App\Models\ArticleMethod;
use App\Models\ArticleMethodPart;
use Illuminate\Http\Request;

class ArticleMethodPartController extends Controller
{

    public function getArticleMethodParts(Request $request)
    {
        $articleMethodParts = ArticleMethodPart::where('articleId', $request->articleId)->get();
        return view('pages.associated_method_parts', compact('articleMethodParts'));
    }

    public function deleteArticleMethodPart()
    {
        $articleMethodParts = ArticleMethodPart::where(['id' => $request->id])->get();
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
        $articleMethodPart = new ArticleMethodPart;
        $articleMethodPart->articleId = $request->articleId;
        $articleMethodPart->part = $request->part;
        $articleMethodPart->title = $request->title;
        $articleMethodPart->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArticleMethodPart  $articleMethodPart
     * @return \Illuminate\Http\Response
     */
    public function showMethodForm($articleId, $partId)
    {
        $data = ArticleMethod::where(['articleId' => $articleId, 'partId' => $partId])->get();
        return view('article.add', compact('data', 'articleId', 'partId'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArticleMethodPart  $articleMethodPart
     * @return \Illuminate\Http\Response
     */
    public function edit(ArticleMethodPart $articleMethodPart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ArticleMethodPart  $articleMethodPart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArticleMethodPart $articleMethodPart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArticleMethodPart  $articleMethodPart
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleMethodPart $articleMethodPart)
    {
        //
    }
}