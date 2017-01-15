<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyNew;
use App\Models\UsersModel;
use App\Models\NewsModel;

class NewsController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function indexAction()
    {
        $news = MyNew::where('id', '>', 0)
            ->orderBy('updated_at', 'desk')
            ->get();
        return view('pages.main', [
            'news' => $news,
            'title' => $this->title,
            'content' => 'pages.news'
        ]);
    }

    public function newAction($id)
    {
        $new = MyNew::findOrFail($id);

        $this->title = $new['title'];

        return view('pages.main', [
            'new' => $new,
            'title' => $this->title,
            'auth' => '',
            'add_edit' => '',
            'add_edit' => '',
            'delete' => '',
            'content' => 'pages.new'
        ]);
    }

    public function addAction()
    {
        $method = $this->request->method();

        if($this->request->isMethod('post')) {
            if ($this->request->has(['title', 'content'])) {
                $title = $this->request->input('title');
                $content = $this->request->input('content');

                $new = new myNew;
                $new->title = $title;
                $new->content = $content;
                $new->save();
            }

            return redirect('');
        }
        else{
            $title = '';
            $content = '';
        }

        $this->title = 'Новая статья';

        return view('pages.main', [
            'auth' => '',
            'title' => $this->title,
            'new_title' => $title,
            'new_content' => $content,
            'errors' => '',
            'add_edit' => '',
            'content' => 'pages.add'
        ]);
    }

    public function editAction($id)
    {
        if($this->request->isMethod('post')) {

            $title = $this->request->input('title');
            $content = $this->request->input('content');

            $new = MyNew::findOrFail($id);
            $new->title = $title;
            $new->content = $content;
            $new->save();

            return redirect('');

        } else {
            $new = MyNew::findOrFail($id);
            $title = $new['title'];
            $content = $new['content'];
        }

        $this->title = $new['title'];

        return view('pages.main', [
            'auth' => '',
            'id' => $id,
            'title' => $this->title,
            'new_title' => $title,
            'new_content' => $content,
            'errors' => '',
            'add_edit' => '',
            'delete' => '',
            'content' => 'pages.edit'
        ]);
    }

    public function deleteAction($id)
    {
        $new = MyNew::findOrFail($id);
        $new->delete();

        return redirect('');
    }
}
