<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Admin\AdminController;
use App\Models\User;

class UserController extends AdminController
{
    public function activate()
    {
        if (!is_null($this->request->input('id')) && !is_null($this->request->input('activate'))) {

            $id = $this->request->input('id');

            $user = User::findOrFail($id);
            $user->activate = $this->request->input('activate');
            $user->save();
        }
    }

    public function delete()
    {
        if (!is_null($this->request->input('id'))) {

            $id = $this->request->input('id');

            $articles = Article::all();

            foreach ($articles as $article) {
                if ($article->author[0]->id == $id) {
                    $article->delete();
                }
            }

            User::destroy($id);
        }
    }
}
