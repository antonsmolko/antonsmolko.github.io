<?php
namespace App\Repositories;

use App\Models\Article;
use Illuminate\Support\Facades\Cache;

class ArticleRepository
{
    public function getLast()
    {
        return Article::where('published', 1)
            ->orderBy('created_at', 'DESC')
            ->first();
    }

    public function allButLast()
    {
        $lastArticle = $this->getLast();

        return Article::where('id', '<>', $lastArticle->id)
            ->orderBy('created_at', 'DESC')
            ->get();
    }
}