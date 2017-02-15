<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
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
        return view('pages.article', [
            'title' => 'Просмотр статьи',
            'article' => $articleRepository->getOne($id)
        ]);
    }
}
