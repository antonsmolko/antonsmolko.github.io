<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Admin\AdminController;
use App\Role;
use DB;

class RoleController extends AdminController
{
    public function delete() {

        if (!is_null($this->request->input('id'))) {

            $id = $this->request->input('id');

//            Role::destroy($id);

            // ! ! ! К О С Т Ы Л Ь ! ! ! //

            DB::table('roles')->where('id', $id)->delete();

            // ! ! ! К О С Т Ы Л Ь ! ! ! //
        }
    }
}
