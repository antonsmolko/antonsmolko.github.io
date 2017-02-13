<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);

        $this->title = 'Регистрация';
    }

    public function register() {


        return view('pages.register', [
            'title' => $this->title
        ]);
    }

    public function registerPost() {

        $this->validate($this->request, [
            'name' => 'required|min:2|max:50',
            'login' => 'required|unique:users,login|min:4|max:50|regex:/^[a-zA-Z0-9]+$/',
            'password' => 'required|min:6|max:50|regex:/^[a-zA-Z0-9]+$/',
            'password2' => 'required|same:password',
            'email' => 'required|email|unique:users,email|max:50'
        ]);

        $user = new User;
        $user->name = trim($this->request->input('name'));
        $user->login = trim($this->request->input('login'));
        $user->password = bcrypt(trim($this->request->input('password')));
        $user->email = trim($this->request->input('email'));
        $user->activate = '1';
        $user->save();

        return redirect()->route('login');
    }

    public function login()
    {

        $this->title = 'Авторизация';

        return view('pages.login', [
            'title' => $this->title
        ]);
    }

    public function showAdmin() {

        if (Auth::user()->can('rule', User::class)) {
            return redirect()->route('admin.users');
        } elseif (Auth::user()->can('rule', Role::class)) {
            return redirect()->route('admin.roles');
        } elseif (Auth::user()->can('rule', Article::class)) {
            return redirect()->route('admin.articles');
        } else {
            return redirect()->route('index');
        }
    }

    public function loginPost()
    {
        $remember = $this->request->input('remember') ? true : false;
        $authResult =  Auth::attempt([
            'login' => $this->request->input('login'),
            'password' => $this->request->input('password')
        ], $remember);
            // Authentication passed...
            if ($authResult) {
                return redirect()->route('index');
            } else {
                return redirect()->route('login')->with('authError', 'Неправильный логин или пароль');
            }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('index');
    }
}
