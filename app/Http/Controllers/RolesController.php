<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use App\Role;
use App\Models\RoleModel;
//use App\Models\Role;

class RolesController extends Controller
{
    protected $mRoles;

    public function  __construct(Request $request)
    {
        parent::__construct($request);

        $this->mRoles = new RoleModel;
    }

    public function showRoles()
    {
        $roles = Role::all();

        return view('admin.main', [
            'title' => 'Роли',
            'roles' => $roles,
            'content' => 'admin.roles'
        ]);
    }

    public function addGet()
    {
        $permissions = Permission::all();

        return view('admin.main', [
            'name' => '',
            'alias' => '',
            'description' => '',
            'permissions' => $permissions,
            'content' => 'admin.roles_add'
        ]);
    }

    public function addPost()
    {
        $this->validate($this->request, [
            'role_name' => 'required|unique:roles,display_name|min:2|max:50',
            'role_alias' => 'required|unique:roles,name|min:2|max:50|regex:/^[a-zA-Z0-9_\-]+$/',
            'role_description' => 'max:250'
        ]);

        $permissions = Permission::all();

        if ($this->request->has('perm')) {
             dd($this->request->input('perm'));
        }

        $role = new Role;
        $role->display_name = trim($this->request->input('role_name'));
        $role->name = strtolower(trim($this->request->input('role_alias')));
        $role->description = trim($this->request->input('role_description'));
        $role->save();

        foreach ($permissions as $permission) {
            if ($this->request->has($permission['name'])) {
                $role->permission()->attach($permission['id']);
            }
        }

        return redirect()->route('admin.roles');
    }

    public function editGet($id)
    {
        $role = Role::findOrFail($id);

        $roles = Role::all();

        $rolesPermissions = $this->mRoles->getSomeRequest($roles, 'name', 'permission');

        if (isset($rolesPermissions[$role['id']])) {
            $rolePermissions = $rolesPermissions[$role['id']];
        } else {
            $rolePermissions = '';
        }

        $permissions = Permission::all();

        return view('admin.main', [
            'role' => $role,
            'rolePermissions' => $rolePermissions,
            'permissions' => $permissions,
            'content' => 'admin.roles_edit'
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
