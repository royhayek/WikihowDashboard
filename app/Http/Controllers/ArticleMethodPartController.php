<?php

namespace App\Http\Controllers;

use App\Models\ArticleMethod;
use App\Models\ArticleMethodPart;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class ArticleMethodPartController extends Controller
{

    public function getArticleMethodParts(Request $request)
    {
        $articleMethodParts = ArticleMethodPart::where('articleId', $request->articleId)->get();
        return view('pages.associated_method_parts', compact('articleMethodParts'));
    }

    public function deleteArticleMethodPart(Request $request)
    {
        $articlemethods = ArticleMethodPart::where('id', $request->partId)->get();
        if (count($articlemethods) > 0) {
            $lastPart =  ((int)$articlemethods->last()->part);
        } else {
            $lastPart = 1;
        }

        ArticleMethodPart::find($request->partId)->delete();

        return response()->json($lastPart, 200);
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
        if ($request->partId == null) {
            $articleMethodPart = new ArticleMethodPart;
            $articleMethodPart->articleId = $request->articleId;
            $articleMethodPart->part = $request->part;
            $articleMethodPart->title = $request->title;
            $articleMethodPart->save();
        } else {
            $articleMethodPart = ArticleMethodPart::find($request->partId);
            $articleMethodPart->articleId = $request->articleId;
            $articleMethodPart->part = $request->part;
            $articleMethodPart->title = $request->title;
            $articleMethodPart->update();
        }
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
        $articlemethods = ArticleMethod::where(['articleId' => $articleId, 'partId' => $partId])->get();
        if (count($articlemethods) > 0) {
            $lastNumber =  ((int)$articlemethods->last()->number + 1);
        } else {
            $lastNumber = 1;
        }
        $parts = ArticleMethodPart::where(['articleId' => $articleId])->get();
        return view('article.add', compact('data', 'articleId', 'partId', 'lastNumber', 'parts'));
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
