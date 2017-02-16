<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\Permission;

class RoleController extends AdminController
{
    public function  __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function showAll()
    {
        $this->authorize('rule', Role::class);

        $roles = Role::all();

        return view('admin.roles', [
            'title' => 'Менеджер ролей',
            'roles' => $roles
        ]);
    }

    public function create()
    {
        $this->authorize('rule', Role::class);

        $permissions = Permission::all();

        return view('admin.roles_create', [
            'title' => 'Новая роль',
            'permissions' => $permissions
        ]);
    }

    public function createPost()
    {
        $this->authorize('rule', Role::class);

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
                $role->permissions()->attach($permission->id);
            }
        }

        return redirect()->route('admin.roles');
    }

    public function edit($id)
    {
        $this->authorize('rule', Role::class);

        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        // Пока не нашел более рационального решения

        foreach($role->permissions as $key) {
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
        $this->authorize('rule', Role::class);

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

        foreach ($permissions as $permission) {
            if ($this->request->has($permission['name'])) {
                $rolePermissions[] = $permission['id'];
            }
        }

        $role->permissions()->sync($rolePermissions);
        $role->save();

        return redirect()->route('admin.roles');
    }
}
