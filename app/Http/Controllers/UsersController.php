<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    protected  $validator;

    public function  __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function loginAction()
    {
        $loginError = '';

        if ($this->request->isMethod('post')) {

            $this->validator->run($this->request->getPost());

            if ($this->validator->isValid) {

                if ($this->mUsers->checkPassword($this->validator->fields['login'], $this->validator->fields['password'])) {
                    $_SESSION['auth'] = true;
                    $_SESSION['login'] = $this->validator->fields['login'];

                    // Если стоит галочка "Запомнить меня"
                    if(isset($this->request->post['remember'])) {

                        setcookie('login', $this->validator->fields['login'], time() + 3600);
                        setcookie('password', md5($this->validator->fields['password']), time() + 3600);
                    }

                    UsersModel::loadRolesPrivileges($this->validator->fields['login']);

                    $this->getRedirect('/');
                } else {
                    $loginError = 'Неправильно указан логин или пароль';
                }
            }

        }

        $this->title = 'Авторизация';

        return view('pages.main', [
            'title' => $this->title,
            'login' => '',
            'password' => '',
            'errors' => '',
            'loginError' => $loginError,
            'auth' => '',
            'content' => 'pages.login'
        ]);
    }

    public function logoutAction()
    {
        unset($_SESSION['auth']);
        setcookie('login', '', time() - 1);
        setcookie('password', '', time() - 1);

        $this->getRedirect('/');
    }

    public function showUsers()
    {
        $users = User::all();

        return view('admin.main', [
            'title' => 'Пользователи',
            'users' => $users,
            'content' => 'admin.users'
        ]);
    }

    public function checkPermission()
    {
        return redirect()->route('admin.users');
    }
}