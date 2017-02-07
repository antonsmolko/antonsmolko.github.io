<?php

namespace App\Http\Controllers;

use App\Article;
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
        $author = false;

        foreach($articles as $article) {
            foreach($article->author as $key) {
                $author[$article->id] = $key;
            }
        }

        return view('pages.articles', [
            'title' => 'MOON',
            'articles' => $articles,
            'author' => $author
        ]);
    }

    public function showOne($id)
    {
        $article = Article::findOrFail($id);

        $author = false;

        foreach ($article->author as $key) {
            $author = $key;
        }

        $article->views += 1;
        $article->save();

        return view('pages.article', [
            'title' => 'Просмотр статьи',
            'article' => $article,
            'author' => $author
        ]);
    }
}
