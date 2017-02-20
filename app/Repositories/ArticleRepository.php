<?php
namespace App\Repositories;

use App\Models\Article;
use Illuminate\Support\Facades\Cache;

class ArticleRepository
{
    protected $article;
    protected $id;

    public function getLast()
    {
//        return Cache::remember('articleLast', env('CACHE_TIME', 0), function () {
            return Article::published()
                ->latest()
                ->first();
//        });
    }

    public function getAllButLast()
    {
//        return Cache::remember('articlesButLast', env('CACHE_TIME', 0), function () {
            if ($this->getLast()) {
                return Article::where('id', '<>', $this->getLast()->id)
                    ->published()
                    ->latest()
                    ->paginate(config('blog.itemsPerPage'));
            };

            return false;
//        });
    }

    public function getOne($id)
    {
        $this->id = $id;

        return Cache::remember('article', env('CACHE_TIME', 0), function () {
            $this->article = Article::findOrFail($this->id);
            $this->article->views += 1;
            $this->article->save();

            return $this->article;
        });
    }
}