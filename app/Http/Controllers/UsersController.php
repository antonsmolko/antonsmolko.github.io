<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use App\User;
use App\Models\UserModel;
use Illuminate\Encryption\Encrypter;

class UsersController extends Controller
{
    protected $mUsers;

    public function  __construct(Request $request)
    {
        parent::__construct($request);

        $this->mUsers = UserModel::instance();
    }

    public function showUsers()
    {
        $users = User::all();

        $roles = $this->mUsers->getSomeRequest($users, 'display_name', 'roles');

        return view('admin.main', [
            'title' => 'Пользователи',
            'users' => $users,
            'roles' => $roles,
            'content' => 'admin.users'
        ]);
    }

    public function checkPermission()
    {
        // Проверка привилегий

        return redirect()->route('admin.users');
    }

    public function addGet()
    {
        $roles = Role::all();

        return view('admin.main', [
            'name' => '',
            'login' => '',
            'password' => '',
            'password2' => '',
            'email' => '',
            'activate' => '',
            'roles' => $roles,
            'content' => 'admin.users_add'
        ]);
    }

    public function addPost()
    {
        $this->validate($this->request, [
            'name' => 'required|min:2|max:50',
            'login' => 'required|unique:users,login|min:4|max:50|regex:/^[a-zA-Z0-9]+$/',
            'password' => 'required|min:6|max:150|regex:/^[a-zA-Z0-9]+$/',
            'password2' => 'required|same:password',
            'email' => 'required|email|unique:users,email|max:50'
        ]);

        $user = new User;
        $user->name = trim($this->request->input('name'));
        $user->login = trim($this->request->input('login'));
        $user->password = bcrypt(trim($this->request->input('password')));
        $user->email = trim($this->request->input('email'));
        $user->activate = $this->request->input('activate');
        $user->save();
        if ($this->request->has('role')) {
            $user->roles()->attach($this->request->input('role'));
        }

        return redirect()->route('admin.users');
    }

    public function editGet($id)
    {
        $user = User::findOrFail($id);

        $users = User::all();

        $userRoles = $this->mUsers->getSomeRequest($users, 'display_name', 'roles');

        if (isset($userRoles[$user['id']])) {
            $userRole = $userRoles[$user['id']][0];
        } else {
            $userRole = '';
        }

        $roles = Role::all();

        return view('admin.main', [
            'user' => $user,
            'userRole' => $userRole,
            'roles' => $roles,
            'content' => 'admin.users_edit'
        ]);
    }

    public function editPost($id)
    {
        $user = User::findOrFail($id);

        $this->validate($this->request, [
            'name' => 'required|min:2|max:50',
            'login' => 'required|unique:users,login,'.$user->id.'|min:4|max:50|regex:/^[a-zA-Z0-9]+$/',
            'password' => 'required|min:6|max:150',
//            'password' => 'required|min:6|max:150|regex:/^[a-zA-Z0-9]+$/',
            'password2' => 'required|same:password',
            'email' => 'required|email|unique:users,email,'.$user->id.'|max:50'
        ]);

        $user->name = trim($this->request->input('name'));
        $user->login = trim($this->request->input('login'));
        $user->password = bcrypt(trim($this->request->input('password')));
        $user->email = trim($this->request->input('email'));
        $user->activate = trim($this->request->input('activate'));
        $user->roles()->detach();

        if ($this->request->has('role')) {
            $user->roles()->attach($this->request->input('role'));
        }

        $user->save();


        return redirect()->route('admin.users');
    }
}