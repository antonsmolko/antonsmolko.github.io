<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Admin\AdminController;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;

class ArticleController extends AdminController
{
    public function activate()
    {

        if (!is_null($this->request->input('id')) && !is_null($this->request->input('activate'))) {

            $id = $this->request->input('id');

            $article = Article::findOrFail($id);
            $article->published = $this->request->input('activate');
            $article->save();
        }
    }

    public function delete() {
        if (!is_null($this->request->input('id'))) {

            $id = $this->request->input('id');

            $article = Article::findOrFail($id);
//            Article::destroy($id);

            Storage::delete([$article->image_full, $article->image_thumb]);

            $article->delete();
        }
    }
}
