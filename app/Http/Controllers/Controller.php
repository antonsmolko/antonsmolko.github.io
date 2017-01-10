<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;
use App\UsersModel;
use App\NewsModel;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $title;
    protected $content;
    protected $mUsers;
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->title = 'Новости';
        $this->mUsers = UsersModel::Instance();
    }

    public function get404()
    {
        $this->title = 'Страница не найдена';
        $this->content = $this->tmpGenerate('view/v_404.php');
        $this->render();
        header('HTTP/1.1 404 Page Not Found');
        die;

    }

    public function render()
    {
        echo $this->tmpGenerate('view/v_main.php',[
            'title' => $this->title,
            'auth' => $this->mUsers->isAuth(),
            'content' => $this->content,
            'add_edit' => UsersModel::hasPermission('editor.add_edit'),
            'user_name' => UsersModel::getUserName(),
            'user_roles' => UsersModel::getUserRoles()
        ]);
    }

    // Подключение шаблона
    protected function tmpGenerate($path, $vars = [])
    {
        ob_start();
        extract($vars);
        include($path);
        $res = ob_get_clean();
        return $res;
    }

    protected function getRedirect($url)
    {
        header("Location: $url");
        die;
    }
}