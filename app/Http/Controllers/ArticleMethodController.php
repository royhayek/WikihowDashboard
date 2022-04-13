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

    public function deleteArticleMethod(Request $request)
    {
        $method = ArticleMethod::find($request->methodId);
        if ($method->image != null) {
            $oldImagePath = public_path("/uploads/articles/methods/$method->image");
            unlink($oldImagePath);
        }
        $articlemethods = ArticleMethod::where('id', $request->methodId)->get();
        if (count($articlemethods) > 0) {
            $lastNumber =  ((int)$articlemethods->last()->number);
        } else {
            $lastNumber = 1;
        }

        ArticleMethod::find($request->methodId)->delete();

        return response()->json($lastNumber, 200);
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

        if ($request->methodId == null) {

            $articleMethod = new ArticleMethod;
            $articleMethod->articleId = $request->articleId;
            $articleMethod->number = $request->number;
            $articleMethod->partId = $request->partId;
            $articleMethod->title = $request->title;
            $articleMethod->description = $request->description;
            $articleMethod->note = $request->note;

            if ($request->file('image')) {
                // if ($articleMethod->image != null) {
                //     $oldImagePath = public_path("/uploads/articles/methods/$articleMethod->image");
                //     unlink($oldImagePath);
                // }
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $imageName = time() . '.' . $extension;
                $image->move('uploads/articles/methods/', $imageName);
                $articleMethod->image = $imageName;
            }

            $articleMethod->save();
        } else {
            $articleMethod = ArticleMethod::find($request->methodId);
            $articleMethod->articleId = $request->articleId;
            $articleMethod->number = $request->number;
            $articleMethod->partId = $request->partId;
            $articleMethod->title = $request->title;
            $articleMethod->description = $request->description;
            $articleMethod->note = $request->note;

            if ($request->file('image')) {
                if ($articleMethod->image != null) {
                    $oldImagePath = public_path("/uploads/articles/methods/$articleMethod->image");
                    unlink($oldImagePath);
                }
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $imageName = time() . '.' . $extension;
                $image->move('uploads/articles/methods/', $imageName);
                $articleMethod->image = $imageName;
            }

            $articleMethod->update();
        }
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
    public function edit($id)
    {
        $data =  ArticleMethod::find($id);
        return view('article.editpart', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ArticleMethod  $articleMethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $articleMethod =  ArticleMethod::find($id);
        $articleMethod->number = $request->number;
        $articleMethod->title = $request->title;
        $articleMethod->description = $request->description;
        $articleMethod->note = $request->note;

        if ($request->hasFile('image')) {
            if ($articleMethod->image != null) {
                $oldImagePath = public_path("/uploads/articles/methods/$articleMethod->image");
                unlink($oldImagePath);
            }
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $extension;
            $image->move('uploads/articles/methods/', $imageName);
            $articleMethod->image = $imageName;
        }

        $articleMethod->save();

        return redirect()->back()->with('success', 'your message,here');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArticleMethod  $articleMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleMethod $articleMethod)
    {
        dd($articleMethod);
    }
}
