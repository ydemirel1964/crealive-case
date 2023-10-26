<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function index(Request $request)
    {
        $articles = Article::paginate();
        return view('admin.dashboard', [
            'articles' => $articles,
        ]);
    }

    public function create(Request $request)
    {
        $categories = Category::all();
        return view('admin.articleCreate', [
            'categories' => $categories,
        ]);
    }

    public function store(ArticleRequest $request)
    {

        $article = Article::create([
            'content_title' => $request->title,
            'content' => $request->content,
            'content_description' => $request->description,
            'user_id' => $request->user()->id,
        ]);

        if ($request->has('categories')) {
            $article->articleCategories()->createMany(
                array_map(function ($category) {
                    return [
                        'category_id' => $category,
                    ];
                }, (array) $request->categories)
            );
        }

        return redirect()->route('admin.article');
    }

    public function edit(Request $request, Article $article)
    {
        $categories = Category::all();
        $selected_categories = $article->articleCategories->pluck('category_id')->toArray();
        return view('admin.articleEdit', [
            'article' => $article,
            'categories' => $categories,
            'selected_categories' => $selected_categories,
        ]);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->update([
            'content_title' => $request->title,
            'content' => $request->content,
            'content_description' => $request->description,
        ]);
        return redirect()->route('admin.article');
    }

    public function destroy(Request $request, Article $article)
    {
        $article->articleCategories()->delete();
        $article->delete();
        return redirect()->route('admin.article');
    }

}
