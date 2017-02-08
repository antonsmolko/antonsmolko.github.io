<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function  __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function showAll()
    {
        $articles = Article::all();

        return view('pages.articles', [
            'title' => 'MOON',
            'articles' => $articles
        ]);
    }

    public function showOne($id)
    {
        $article = Article::findOrFail($id);

        $article->views += 1;
        $article->save();

        return view('pages.article', [
            'title' => 'Просмотр статьи',
            'article' => $article
        ]);
    }
}
