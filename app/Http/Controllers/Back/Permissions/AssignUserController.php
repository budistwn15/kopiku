<?php

namespace App\Http\Controllers\Back\Permissions;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class AssignUserController extends Controller
{
    public function index()
    {
        $users = User::get();
        $roles = Role::get();
        return view('back.management.user.permissions.assign-user.index',[
            'users' => $users,
            'roles' => $roles
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'roles' => 'required|array'
        ]);

        $user = User::where('email', $request->email)->first();
        $user->assignRole($request->roles);

        Alert::success('Sukses',"Berhasil menambahkan role kepada user $user->name");
        return back();
    }

    public function edit(User $user)
    {
        $users = User::get();
        $roles = Role::get();
        return view('back.management.user.permissions.assign-user.sync',[
            'user' => $user,
            'users' => $users,
            'roles' => $roles
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'email' => 'required',
        ]);

        $user->syncRoles($request->roles);
        Alert::success('Sukses', "Berhasil synchronize role kepada user $user->name");
        return redirect()->route('assign-users.index');
    }
}
