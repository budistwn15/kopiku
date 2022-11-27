<?php

namespace App\Http\Controllers\Back\Permissions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(Permission $permission)
    {
        $permissions = Permission::get();
        return view('back.management.user.permissions.permission.index', [
            'permissions' => $permissions,
            'permission' => $permission
        ]);
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required'
        ]);

        Permission::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name ?? 'web'
        ]);

        Alert::success('Sukses', "Permission $request->name berhasil ditambahkan");
        return back();
    }

    public function edit(Permission $permission)
    {
        return view('back.management.user.permissions.permission.edit', [
            'permission' => $permission
        ]);
    }

    public function update(Request $request, Permission $permission)
    {
        request()->validate([
            'name' => 'required'
        ]);

        $permission->update([
            'name' => $request->name,
            'guard_name' => $request->guard_name ?? 'web'
        ]);

        Alert::success('Sukses', "Permission $request->name berhasil diubah");
        return redirect()->route('permissions.index');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        Alert::success('Sukses', "Permission $permission->name berhasil dihapus");
        return redirect()->route('permissions.index');
    }
}
