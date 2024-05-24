<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with(['category', 'user'])->orderBy("created_at","desc")->get();
        return view("articles.index", compact("articles"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("articles.create", compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|max:50|min:3|unique:articles",
            "content" => "required|max:150|min:10"
        ]);

        Article::create([
            "title"=> $request->title,
            "content"=> $request->content,
            "user_id" => 1,
            "category_id" => $request->category_id
        ]);

        return redirect()->route("articles.index")->with("success","L'article a été crée avec success");
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view("articles.show", compact("article"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        return view("articles.edit", compact("article", "categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $article->update([
            "title"=> $request->title,
            "content"=> $request->content,
            "category_id"=> $request->category_id
        ]);

        return redirect()->route("articles.index")->with("success","L'article a été modifié avec success");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route("articles.index")->with("success","L'article a été supprimé avec success");
    }
}
