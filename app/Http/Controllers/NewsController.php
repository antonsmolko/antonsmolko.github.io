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
//        UserModel::loadRolesPrivileges($_SESSION['login']);
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
//        if (!$this->request->getGet()['id']) {
//            $this->get404();
//        }
//
//        $cId = new Id();
//        $id_new = $cId->setId($this->request->getGet()['id']);
//
//        $mNews = NewsModel::Instance();
//        $new = $mNews->get($id_new);

        $new = MyNew::findOrFail($id);

//        if (!$new) {
//            $this->get404();
//        }

        $this->title = $new['title'];

        return view('pages.main', [
            'new' => $new,
            'title' => $this->title,
            'auth' => '',
            'add_edit' => '',
            'delete' => '',
            'content' => 'pages.new'
        ]);
    }

    public function addAction()
    {
        //$errors = [];

        //$post = $this->request->getPost();
//        $method = $this->request->method();

//        if(true) {
////            if ($this->request->has(['title', 'content'])) {
////                $title = $this->request->input('title');
////                $content = $this->request->input('content');
////                //$title = htmlspecialchars(trim($post['title']));
////                //$content = htmlspecialchars(trim($post['content']));
////
////                //$mNews = NewsModel::Instance();
////                //$errors = $mNews->validate($title, $content);
////                $new = new myNew;
////
////                $new->title = $title;
////
////                $new->content = $content;
////
////                $new->save();
////            }
//
//
////            if(empty($errors)) {
////
////
////
//////                $mNews->add($title, $content);
//////                $this->getRedirect('/');
////            }
//        }
//        else{
//            $title = '';
//            $content = '';
//        }

        $this->title = 'Новая статья';

        return view('pages.main', [
            'auth' => '',
            'title' => $this->title,
            'new_title' => '',
            'new_content' => '',
            'errors' => '',
            'add_edit' => '',
            'content' => 'pages.add'
        ]);
    }

    public function editAction($id)
    {
//        $cId = new Id();
//        $id_new = $cId->setId($this->request->getGet()['id']);
//
//        $errors = [];
//
//        $new = [];
//
//        $post = $this->request->getPost();
//
//        $mNews = NewsModel::Instance();

        if(count($_POST) > 0) {

//            $title = htmlspecialchars(trim($post['title']));
//            $content = htmlspecialchars(trim($post['content']));
//
//            $errors = $mNews->validate($title, $content);
//
//            if(empty($errors)) {
//                $mNews->edit($title, $content, $id_new);
//                $this->getRedirect("/new/$id_new");
//            }
        } else {
            $new = MyNew::findOrFail($id);
            //$new = $mNews->get($id_new);
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

    public function deleteAction()
    {
        $cId = new Id();
        $id_new = $cId->setId($this->request->getGet()['id']);

        $mNews = NewsModel::Instance();
        $new = $mNews->get($id_new);

        $this->title = $new['title'];

        $this->content = $this->tmpGenerate('view/v_new.php',[
            'new' => $new,
            'auth' => $this->mUsers->isAuth(),
            'delete' => UsersModel::hasPermission('moderator.delete_articles')
        ]);

        $mNews = NewsModel::Instance();
        $mNews->delete($id_new);
        $this->getRedirect('/');
    }
}
