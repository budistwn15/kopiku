<?php

namespace App\Http\Controllers\Back\Permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
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

    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'permissions' => 'array|required'
        ]);

        $role = Role::find($request->role);
        $role->givePermissionTo($request->permissions);

        Alert::success('Sukses',"Permission berhasil diberikan kepada role {$role->name}");
        return back();
    }

    public function edit(Role $role)
    {
        $roles = Role::get();
        $permissions = Permission::get();
        return view('back.management.user.permissions.assign-permission.sync',[
            'role' => $role,
            'roles' => $roles,
            'permissions' => $permissions
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'role' => 'required',
            'permissions' => 'array|required'
        ]);

        $role->syncPermissions($request->permissions);

        Alert::success('Sukses','Permission berhasil di synchronize');
        return redirect()->route('assign-permissions.index');
    }
}
