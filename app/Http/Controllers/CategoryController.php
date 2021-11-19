<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::all();
        return view('category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:categories',
            'icon' => 'required',
            'description' => 'nullable|string',
        ]);



        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;

        if ($request->hasFile('icon')) {

            $icon = $request->file('icon');
            $extension = $icon->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $icon->move('uploads/categories/', $filename);
            $category->icon = $filename;
        }else {
            $category->icon = '';
        }

        $category->save();

        return redirect()->route('category.index')->withSuccess('Category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $data = $category;
        return view('category.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->name = $request->name;
        $category->description = $request->description;
        if ($request->hasFile('icon')) {
            if($category->icon != null){
                $oldImagePath = public_path("/uploads/categories/$category->icon");
                unlink($oldImagePath);
            }
            $icon = $request->file('icon');
            $extension = $icon->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $icon->move('uploads/categories/', $filename);
            $category->icon = $filename;
        }
        $category->update();

        return redirect()->route('category.index')->withStatus(__('Category was updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->image != null) {
            $oldImagePath = public_path("/uploads/categories/$category->image");
            unlink($oldImagePath);
        }
        $category->delete();
        return redirect()->route('category.index')->withStatus(__('Category was deleted.'));
    }
}
