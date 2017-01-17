<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use App\User;

class UsersController extends Controller
{
    protected  $validator;

    public function  __construct(Request $request)
    {
        parent::__construct($request);
        $this->validator = new \Validator;
    }

//    public function loginAction()
//    {
//        $loginError = '';
//
//        if ($this->request->isMethod('post')) {
//
//            $this->validator->run($this->request->getPost());
//
//            if ($this->validator->isValid) {
//
//                if ($this->mUsers->checkPassword($this->validator->fields['login'], $this->validator->fields['password'])) {
//                    $_SESSION['auth'] = true;
//                    $_SESSION['login'] = $this->validator->fields['login'];
//
//                    // Если стоит галочка "Запомнить меня"
//                    if(isset($this->request->post['remember'])) {
//
//                        setcookie('login', $this->validator->fields['login'], time() + 3600);
//                        setcookie('password', md5($this->validator->fields['password']), time() + 3600);
//                    }
//
//                    UsersModel::loadRolesPrivileges($this->validator->fields['login']);
//
//                    $this->getRedirect('/');
//                } else {
//                    $loginError = 'Неправильно указан логин или пароль';
//                }
//            }
//
//        }
//
//        $this->title = 'Авторизация';
//
//        return view('pages.main', [
//            'title' => $this->title,
//            'login' => '',
//            'password' => '',
//            'errors' => '',
//            'loginError' => $loginError,
//            'auth' => '',
//            'content' => 'pages.login'
//        ]);
//    }
//
//    public function logoutAction()
//    {
//        unset($_SESSION['auth']);
//        setcookie('login', '', time() - 1);
//        setcookie('password', '', time() - 1);
//
//        $this->getRedirect('/');
//    }

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

//    public function moveAdd()
//    {
//        if ($this->request->has(['add'])) {
//            return redirect()->route('admin.users.add');
//        }
//    }

    public function addGet()
    {
        return view('admin.main', [
            'name' => '',
            'login' => '',
            'password' => '',
            'password2' => '',
            'email' => '',
            'activate' => '',
            'content' => 'admin.users_add'
        ]);
    }

    public function addPost()
    {
        $this->validate($this->request, [
            'name' => 'required|min:2|max:50',
            'login' => 'required|unique:users|min:4|max:50|regex:/^[a-zA-Z0-9]+$/',
            'password' => 'required|min:6|max:50|regex:/^[a-zA-Z0-9]+$/',
            'password2' => 'required|same:password',
            'email' => 'required|email|unique:users|max:50'
        ]);

        $user = new User;
        $user->user_name = $this->request->input('name');
        $user->user_login = $this->request->input('login');
        $user->user_password = $this->request->input('password');
        $user->user_email = $this->request->input('email');
        $user->user_activate = $this->request->input('activate');
        $user->save();

        return redirect()->route('admin.users');
    }

    public function editGet($id)
    {
        $user = User::findOrFail($id);

        return view('admin.main', [
            'user' => $user,
            'content' => 'admin.users_edit'
        ]);
    }

    public function editPost($id)
    {
        $user = User::findOrFail($id);

        $this->validate($this->request, [
            'name' => 'required|min:2|max:50',
            'login' => 'required|unique:users,login,'.$user->id.'|min:4|max:50|regex:/^[a-zA-Z0-9]+$/',
            'password' => 'required|min:6|max:50|regex:/^[a-zA-Z0-9]+$/',
            'password2' => 'required|same:password',
            'email' => 'required|email|unique:users,email,'.$user->id.'|max:50'
        ]);

        $user->user_name = $this->request->input('name');
        $user->user_login = $this->request->input('login');
        $user->user_password = $this->request->input('password');
        $user->user_email = $this->request->input('email');
        $user->user_activate = $this->request->input('activate');
        $user->save();

        return redirect()->route('admin.users');
    }
}