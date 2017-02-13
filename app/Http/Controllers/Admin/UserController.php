<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;

class UserController extends AdminController
{
    public function  __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function showAll()
    {
        if (Auth::user()->can('rule', User::class)) {
            $users = User::all();

            return view('admin.users', [
                'title' => 'Пользователи',
                'users' => $users,
            ]);
        }

        abort(403);
    }

    public function create()
    {
        if (Auth::user()->can('create', User::class)) {

            $roles = Role::all();

            return view('admin.users_create', [
                'title' => 'Новый пользователь',
                'roles' => $roles
            ]);
        }

        abort(403);
    }

    public function createPost()
    {
        if (Auth::user()->can('create', User::class)) {

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
                $user->role()->attach($this->request->input('role'));
            }

            return redirect()->route('admin.users');
        }

        abort(403);
    }

    public function edit($id)
    {
        if (Auth::user()->can('edit', User::class)) {

            $user = User::findOrFail($id);
            $roles = Role::all();

            return view('admin.users_edit', [
                'title' => 'Редактор пользователя',
                'user' => $user,
                'roles' => $roles
            ]);
        }

        abort(403);
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

        if ($this->request->has('roleId')) {
            $user->role()->sync([$this->request->input('roleId')]);
        }

        $user->save();

        return redirect()->route('admin.users');
    }
}
