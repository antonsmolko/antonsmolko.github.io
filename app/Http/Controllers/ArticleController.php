<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ArticleController extends Controller
{
    protected $articles;
    protected $article;

    public function  __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function showAll(ArticleRepository $articleRepository)
    {
        $this->articles = $articleRepository;

        return View::share('showAll', Cache::remember('showAll', env('CACHE_TIME', 0), function () {
            return view('pages.articles', [
                'title' => 'Laravel.blog',
                'articleLast' => $this->articles->getLast(),
                'articles' => $this->articles->getAllButLast()
            ])->render();
        }));
    }

    public function showOne($id, ArticleRepository $articleRepository)
    {
        $this->article = $articleRepository->getOne($id);

        return View::share('showOne', Cache::remember('showOne', env('CACHE_TIME', 0), function () {
            return view('pages.article', [
                'title' => 'Просмотр статьи',
                'article' => $this->article
            ])->render();
        }));
    }
}
