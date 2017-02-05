<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Validation\Validator;
use App\User;

class UsersController extends Controller
{
    protected $mUsers;
    protected $auth;

    public function  __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function show()
    {
        $users = User::all();

        foreach($users as $user) {
            foreach($user->roles as $key) {
                $role[$user->id] = $key;
            }
        }

        return view('admin.users', [
            'title' => 'Пользователи',
            'users' => $users,
            'role' => $role
        ]);
    }

    public function activate()
    {
        if (!is_null($this->request->input('id')) && !is_null($this->request->input('activate'))) {
            $id = $this->request->input('id');

            $user = User::findOrFail($id);

            $user->activate = $this->request->input('activate');
            $user->save();
        }
    }

    public function delete() {
        if (!is_null($this->request->input('id'))) {
            $id = $this->request->input('id');

            User::destroy($id);
        }
    }

    public function create()
    {
        $roles = Role::all();

        return view('admin.users_create', [
            'title' => 'Новый пользователь',
            'name' => '',
            'login' => '',
            'password' => '',
            'password2' => '',
            'email' => '',
            'activate' => '',
            'roles' => $roles
        ]);
    }

    public function createPost()
    {
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
        $user->activate = $this->request->input('activate');
        $user->save();
        if ($this->request->has('role')) {
            $user->roles()->attach($this->request->input('role'));
        }

        return redirect()->route('admin.users');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $role = false;

        foreach ($user->roles as $key) {
            $role = $key;
        }

        return view('admin.users_edit', [
            'title' => 'Редактор пользователя',
            'user' => $user,
            'role' => $role,
            'roles' => $roles
        ]);
    }

    public function editPost($id)
    {
        $user = User::findOrFail($id);

        $this->validate($this->request, [
            'name' => 'required|min:2|max:50',
            'login' => 'required|unique:users,login,'.$user->id.'|min:4|max:50|regex:/^[a-zA-Z0-9]+$/',
            'password' => 'sometimes|min:6|max:50|regex:/^[a-zA-Z0-9]+$/',
            'password2' => 'required_with:password|same:password',
            'email' => 'required|email|unique:users,email,'.$user->id.'|max:50'
        ]);

        $user->name = trim($this->request->input('name'));
        $user->login = trim($this->request->input('login'));
        if ($this->request->has('password')) {
            $user->password = bcrypt(trim($this->request->input('password')));
        }
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