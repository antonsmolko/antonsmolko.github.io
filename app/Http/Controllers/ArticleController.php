<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function  __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function showAll()
    {
        $articles = Article::all();
        $author = false;

        foreach($articles as $article) {
            foreach($article->author as $key) {
                $author[$article->id] = $key;
            }
        }

        return view('pages.articles', [
            'title' => 'MOON',
            'articles' => $articles,
            'author' => $author
        ]);
    }

    public function showOne($id)
    {
        $article = Article::findOrFail($id);

        $author = false;

        foreach ($article->author as $key) {
            $author = $key;
        }

        return view('pages.article', [
            'title' => 'Просмотр статьи',
            'article' => $article,
            'author' => $author
        ]);
    }

    public function show()
    {
        $articles = Article::all();

        foreach($articles as $article) {
            foreach($article->author as $key) {
                $author[$article->id] = $key;
            }
        }

        return view('admin.articles', [
            'title' => 'Менеджер статей',
            'articles' => $articles,
            'author' => $author
        ]);
    }

    public function create()
    {
        $author = Auth::user();

        return view('admin.articles_create', [
            'title' => 'Новая статья',
            'article_title' => '',
            'article_content' => '',
            'author' => $author
        ]);
    }

    public function createPost()
    {
        $this->validate($this->request, [
            'title' => 'required|unique:articles,title|min:1|max:250',
            'content' => 'required|min:1|max:5000'
        ]);

        $article = new Article;
        $article->title = trim($this->request->input('title'));
        $article->content = trim($this->request->input('content'));
        $article->published = trim($this->request->input('publish'));
        $article->save();
        if ($this->request->has('author')) {
            $article->author()->attach($this->request->input('author'));
        }

        return redirect()->route('admin.articles');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $author = false;

        foreach($article->author as $key) {
            $author = $key;
        }

        return view('admin.articles_edit', [
            'title' => 'Редактор статьи',
            'article' => $article,
            'author' => $author
        ]);
    }

    public function editPost($id)
    {
        $article = Article::findOrFail($id);

        $this->validate($this->request, [
            'title' => 'required|unique:articles,title,'.$article->id.'|min:1|max:250',
            'content' => 'required|min:1|max:5000'
        ]);

        $article->title = trim($this->request->input('title'));
        $article->content = trim($this->request->input('content'));
        $article->published = trim($this->request->input('publish'));
        $article->save();
        $article->author()->detach();

        if ($this->request->has('author')) {
            $article->author()->attach($this->request->input('author'));
        }

        $article->save();

        return redirect()->route('admin.articles');
    }
}
