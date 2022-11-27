<?php

namespace App\Http\Controllers\Back\Permissions;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    public function index(Role $role)
    {
        $roles = Role::get();
        return view('back.management.user.permissions.roles.index',[
            'roles' => $roles,
            'role' => $role
        ]);
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required'
        ]);

        Role::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name ?? 'web'
        ]);

        Alert::success('Sukses',"Role $request->name berhasil ditambahkan");
        return back();
    }

    public function edit(Role $role)
    {
        return view('back.management.user.permissions.roles.edit',[
            'role' => $role
        ]);
    }

    public function update(Request $request, Role $role)
    {
        request()->validate([
            'name' => 'required'
        ]);

        $role->update([
            'name' => $request->name,
            'guard_name' => $request->guard_name ?? 'web'
        ]);

        Alert::success('Sukses', "Role $request->name berhasil diubah");
        return redirect()->route('roles.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        Alert::success('Sukses', "Role $role->name berhasil dihapus");
        return redirect()->route('roles.index');
    }
}
