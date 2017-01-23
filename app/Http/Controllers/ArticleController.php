<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Http\Request;
use App\Models\ArticleModel;

class ArticleController extends Controller
{
    protected $mArticle;
    protected $articles;

    public function  __construct(Request $request)
    {
        parent::__construct($request);
        $this->mArticle = new ArticleModel();
        $this->articles = Article::all();
    }

    public function showList()
    {
        $author = $this->mArticle->getSomeRequest($this->articles, 'name', 'author');

        return view('admin.main', [
            'title' => 'Блог',
            'articles' => $this->articles,
            'author' => $author,
            'content' => 'admin.articles'
        ]);
    }

    public function addGet()
    {
        // Автор жестко указан с id = 44 (Иван Смолко)
        $author = User::findOrFail(43);

        return view('admin.main', [
            'title' => '',
            'article_content' => '',
            'author' => $author,
            'content' => 'admin.articles_add'
        ]);
    }

    public function addPost()
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

    public function editGet($id)
    {
        $article = Article::findOrFail($id);

        $authors = $this->mArticle->getSomeRequest($this->articles, 'name', 'author');

        if (isset($authors[$article['id']])) {
            $author = $authors[$article['id']][0];
        } else {
            $author = '';
        }

        //Получение ID автора статьи
        $authorsID = $this->mArticle->getSomeRequest($this->articles, 'id', 'author');

        if (isset($authorsID[$article['id']])) {
            $authorID = $authorsID[$article['id']][0];
        } else {
            $authorID = '';
        }

        return view('admin.main', [
            'article' => $article,
            'author' => $author,
            'authorID' => $authorID,
            'content' => 'admin.articles_edit'
        ]);
    }

    public function editPost($id)
    {
        $article = Article::findOrFail($id);

        $this->validate($this->request, [
            'title' => 'required|unique:articles,title,'.$article->id.'|min:1|max:250',
            'content' => 'required|min:1|max:5000'
        ]);

        // Автор жестко указан с id = 44 (Иван Смолко)
        $author = User::findOrFail(43);

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
