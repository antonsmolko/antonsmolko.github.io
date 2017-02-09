<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ArticleController extends Controller
{
    public function  __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function showAll()
    {
      $articles = Article::where('published', 1)
          ->orderBy('created_at', 'DESC')
          ->get();

//        $articles = Article::all();
        Cache::put('articles', $articles, 10);
        $articlesCash = Cache::get('articles');

        return view('pages.articles', [
            'title' => 'MOON',
            'articles' => $articlesCash
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
