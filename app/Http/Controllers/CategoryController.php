<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view("categories.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("categories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=> "required|max:50|min:3|unique:categories",
            "description"=> "min:10|nullable",
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route("categories.index")->with("success","La catégorie a été crée avec succès");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
         $articles = $category->articles;
        return view('categories.show', compact('category', 'articles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view("categories.edit", compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route("categories.index")->with("success","La catégorie a été modifiée avec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route("categories.index")->with("success","La catégorie a été supprimée avec succès");
    }
}
