<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;

class ArticleController extends AdminController
{
    public function  __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function showAll()
    {
        $articles = Article::all();

        return view('admin.articles', [
            'title' => 'Менеджер статей',
            'articles' => $articles
        ]);
    }

    public function create()
    {
        return view('admin.articles_create', [
            'title' => 'Новая статья'
        ]);
    }

    public function createPost()
    {
        $this->validate($this->request, [
            'title' => 'required|unique:articles,title|min:1|max:250',
            'content' => 'required|min:1|max:5000',
            'image' => 'file|image|mimes:jpeg,bmp,png,gif,tiff|min:10|max:10240'
        ]);

        $fileName = uploadImage($this->request->file('image'));

        $article = new Article;
        $article->title = trim($this->request->input('title'));
        $article->content = trim($this->request->input('content'));
        if ($this->request->hasFile('image') && $this->request->file('image')->isValid()) {
            $article->image_full = UPLOAD_DIR . FULL_DIR . $fileName;
            $article->image_thumb = UPLOAD_DIR . THUMB_DIR . $fileName;
        }
        $article->published = trim($this->request->input('publish'));
        $article->save();
        if ($this->request->has('authorId')) {
            $article->author()->attach($this->request->input('authorId'));
        }

        return redirect()->route('admin.articles');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);

        return view('admin.articles_edit', [
            'title' => 'Редактор статьи',
            'article' => $article
        ]);
    }

    public function editPost($id)
    {
        $article = Article::findOrFail($id);

        $this->validate($this->request, [
            'title' => 'required|unique:articles,title,'.$article->id.'|min:1|max:250',
            'content' => 'required|min:1|max:5000',
            'image' => 'file|image|mimes:jpeg,bmp,png,gif,tiff|min:10|max:10240'
        ]);

        $fileName = uploadImage($this->request->file('image'));

        $article->title = trim($this->request->input('title'));
        $article->content = trim($this->request->input('content'));

        if ($this->request->hasFile('image') && $this->request->file('image')->isValid()) {
            $article->image_full = UPLOAD_DIR . FULL_DIR . $fileName;
            $article->image_thumb = UPLOAD_DIR . THUMB_DIR . $fileName;
        }

        $article->published = trim($this->request->input('publish'));

        if ($this->request->has('authorId')) {
            $article->author()->sync([$this->request->input('authorId')]);
        }

        $article->save();

        return redirect()->route('admin.articles');
    }
}
