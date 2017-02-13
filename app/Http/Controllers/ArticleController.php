<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ArticleController extends Controller
{
    public function  __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function showAll(ArticleRepository $articleRepository)
    {
        if ($articleRepository->getLast()) {
            Cache::put('articleLast', $articleRepository->getLast(), 10);
            $articleLastCache = Cache::get('articleLast');
        } else {
            $articleLastCache = '';
        }

        if ($articleRepository->getLast()) {
            Cache::put('articlesButLast', $articleRepository->allButLast(), 10);
            $articlesButLastCache = Cache::get('articlesButLast');
        } else {
            $articlesButLastCache = [];
        }

        return view('pages.articles', [
            'title' => 'MOON',
            'articleLast' => $articleLastCache,
            'articles' => $articlesButLastCache
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
