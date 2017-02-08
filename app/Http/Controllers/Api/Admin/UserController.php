<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Admin\AdminController;
use App\User;

class UserController extends AdminController
{
    public function activate()
    {
        if (!is_null($this->request->input('id')) && !is_null($this->request->input('activate'))) {

            $id = $this->request->input('id');

            $user = User::findOrFail($id);
            $user->activate = $this->request->input('activate');
            $user->save();
        }
    }

    public function delete()
    {
        if (!is_null($this->request->input('id'))) {

            $id = $this->request->input('id');

            User::destroy($id);
        }
    }
}
