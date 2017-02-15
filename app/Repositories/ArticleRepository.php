<?php
namespace App\Repositories;

use App\Models\Article;
use Illuminate\Support\Facades\Cache;

class ArticleRepository
{
    public function getLast()
    {
        $articleLast = Article::where('published', 1)
            ->latest()
            ->first();

        if ($articleLast) {
            Cache::put('articleLast', $articleLast, env('CACHE_TIME', 0));
            return Cache::get('articleLast');
        } else {
            return '';
        }
    }

    public function getAllButLast()
    {
        $articlesButLast = Article::where('id', '<>', $this->getLast()->id)
            ->latest()
            ->paginate(config('blog.itemsPerPage'));

        if ($articlesButLast) {
            Cache::put('articlesButLast', $articlesButLast, env('CACHE_TIME', 0));
            return Cache::get('articlesButLast');
        } else {
            return [];
        }
    }

    public function getOne($id)
    {
        $article = Article::findOrFail($id);
        $article->views += 1;
        $article->save();

        return $article;
    }
}