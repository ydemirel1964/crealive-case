<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function index(Request $request)
    {
        $articles = Article::limit(5)->paginate();
        return view('home', [
            'articles' => $articles,
        ]);
    }

    public function show(Request $request, Article $article)
    {
        return view('article', [
            'article' => $article,
        ]);
    }
}
