<?php

namespace App\Http\Controllers\Back\Permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AssignPermissionController extends Controller
{
    public function index()
    {
        $roles = Role::get();
        $permissions = Permission::get();
        return view('back.management.user.permissions.assign-permission.index',[
            'roles' => $roles,
            'permissions' => $permissions
        ]);
    }
}
