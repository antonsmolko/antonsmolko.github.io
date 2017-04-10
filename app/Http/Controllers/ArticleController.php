<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
//    protected $articles;
    protected $article;

    public function  __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function showAll(ArticleRepository $articleRepository)
    {
        return view('pages.articles', [
            'title' => 'Laravel.blog',
            'articleLast' => $articleRepository->getLast(),
            'articles' => $articleRepository->getAllButLast()
        ]);
    }

    public function showOne($id, ArticleRepository $articleRepository)
    {
        $this->article = $articleRepository->getOne($id);

//        return View::share('showOne', Cache::remember('showOne', env('CACHE_TIME', 0), function () {
            return view('pages.article', [
                'title' => 'Просмотр статьи',
                'article' => $this->article
            ])->render();
//        }));
    }
}
