<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use App\Role;

class RolesController extends Controller
{
    public function  __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function show()
    {
        $roles = Role::all();

        return view('admin.roles', [
            'title' => 'Менеджер ролей',
            'roles' => $roles
        ]);
    }

    public function delete() {

        if (!is_null($this->request->input('id'))) {

            $id = $this->request->input('id');

            Role::destroy($id);
        }
    }

    public function create()
    {
        $permissions = Permission::all();

        return view('admin.roles_create', [
            'title' => 'Новая роль',
            'permissions' => $permissions
        ]);
    }

    public function createPost()
    {
        $this->validate($this->request, [
            'role_name' => 'required|unique:roles,display_name|min:2|max:50',
            'role_alias' => 'required|unique:roles,name|min:2|max:50|regex:/^[a-zA-Z0-9_\-]+$/',
            'role_description' => 'max:250'
        ]);

        $permissions = Permission::all();

        $role = new Role;
        $role->display_name = trim($this->request->input('role_name'));
        $role->name = strtolower(trim($this->request->input('role_alias')));
        $role->description = trim($this->request->input('role_description'));
        $role->save();

        foreach ($permissions as $permission) {
            if ($this->request->has($permission->name)) {
                $role->permission()->attach($permission->id);
            }
        }

        return redirect()->route('admin.roles');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        foreach($role->permission as $key) {
            $permission[$key->id] = $key;
        }

        return view('admin.roles_edit', [
            'title' => 'Редактор роли',
            'role' => $role,
            'permission' => $permission,
            'permissions' => $permissions
        ]);
    }

    public function editPost($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        $this->validate($this->request, [
            'role_name' => 'required|unique:roles,display_name,'.$role->id.'|min:2|max:50',
            'role_alias' => 'required|unique:roles,name,'.$role->id.'|min:2|max:50|regex:/^[a-zA-Z0-9_\-]+$/',
            'role_description' => 'max:250'
        ]);

        $role->name = strtolower(trim($this->request->input('role_alias')));
        $role->display_name = trim($this->request->input('role_name'));
        $role->description = trim($this->request->input('role_description'));
        $role->permission()->detach();

        foreach ($permissions as $permission) {
            if ($this->request->has($permission['name'])) {
                $role->permission()->attach($permission['id']);
            }
        }

        $role->save();

        return redirect()->route('admin.roles');
    }
}
