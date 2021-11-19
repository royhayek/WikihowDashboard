<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Category;
use Auth;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Article::all();
        return view('article.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required|unique:articles',
        //     'description' => 'required',
        // ]);

        $article = new Article;
        $article->authorId = Auth::user()->id;
        $article->title = $request->title;
        $article->description = $request->description;
        $article->tips = $request->tips;
        $article->references = $request->references;
        $article->articleInfo = $request->articleInfo;
        $article->warnings = $request->warnings;
        $article->thingsNeeded = $request->thingsNeeded;
        $article->videoTranscript = $request->videoTranscript;
        $article->keyTakeaways = $request->keyTakeaways;
        $article->views = 0;

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $extension;
            $image->move('uploads/articles/', $imageName);
            $article->image = $imageName;
        } else {
            $article->image = '';
        }

        if ($request->hasFile('video')) {

            $video = $request->file('video');
            $extension = $video->getClientOriginalExtension();
            $videoName = time() . '.' . $extension;
            $video->move('uploads/articles/', $videoName);
            $article->video = $videoName;
        } else {
            $article->video = '';
        }

        $article->save();

        foreach ($request->categories as $categoryId) {
            $articleCategory = new ArticleCategory;
            $articleCategory->articleId = $article->id;
            $articleCategory->categoryId = $categoryId;
            $articleCategory->save();
        }

        return redirect()->route('article.index')->withSuccess('Article created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $data = $article;
        return view('article.addpart', compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {

        $data = $article;
        $categories = Category::all();
        $selectedCategories = ArticleCategory::where('articleId', $article->id)->get();
        return view('article.edit', compact('data', 'categories', 'selectedCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
        $article->title = $request->title;
        $article->description = $request->description;
        $article->tips = $request->tips;
        $article->references = $request->references;
        $article->articleInfo = $request->articleInfo;
        $article->warnings = $request->warnings;
        $article->thingsNeeded = $request->thingsNeeded;
        $article->videoTranscript = $request->videoTranscript;
        $article->keyTakeaways = $request->keyTakeaways;

        if ($request->hasFile('image')) {
            if ($article->image != null) {
                $oldImagePath = public_path("/uploads/articles/$article->image");
                unlink($oldImagePath);
            }
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $extension;
            $image->move('uploads/articles/', $imageName);
            $article->image = $imageName;
        }

        if ($request->hasFile('video')) {
            if ($article->video != null) {
                $oldImagePath = public_path("/uploads/articles/$article->video");
                unlink($oldImagePath);
            }
            $video = $request->file('video');
            $extension = $video->getClientOriginalExtension();
            $videoName = time() . '.' . $extension;
            $video->move('uploads/articles/', $videoName);
            $article->video = $videoName;
        }

        $ids = collect($request->categories)->toArray();
        $existingArticleCategories = ArticleCategory::where('articleId', $article->id)->pluck('categoryId')->toArray();
        $deletableIds = array_diff($existingArticleCategories, $ids);

        if(!is_null($deletableIds)) {
            foreach($deletableIds as $deletableId) {
                ArticleCategory::where(['articleId' => $article->id, 'categoryId' => $deletableId])->delete();
            }
        }

        if($request->categories != null) {
            foreach($request->categories as $categoryId) {
                $existingCategory = ArticleCategory::where(['articleId' => $article->id, 'categoryId' => $categoryId])->first();
                if($existingCategory) {
                    $existingCategory->categoryId = $categoryId;
                    $existingCategory->save();
                } else {
                    $articleCategory = new ArticleCategory;
                    $articleCategory->categoryId = $categoryId;
                    $articleCategory->articleId = $article->id;
                    $articleCategory->save();
                }
            }
        }

        $article->update();

        return redirect()->route('article.index')->withStatus(__('Article was updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if ($article->image != null) {
            $oldImagePath = public_path("/uploads/categories/$article->image");
            unlink($oldImagePath);
        }
        if ($article->video != null) {
            $oldVideoPath = public_path("/uploads/categories/$article->video");
            unlink($oldVideoPath);
        }
        $article->delete();
        return redirect()->route('article.index')->withStatus(__('Article was deleted.'));
    }

}
