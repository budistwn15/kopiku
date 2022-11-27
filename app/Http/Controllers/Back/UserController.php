<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name','asc')->get();
        return view('back.management.user.users.index',[
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('back.management.user.users.create');
    }

    public function store(UserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Alert::success('Sukses',"User $request->name berhasil ditambahkan");
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        Alert::success('Sukses',"User $user->name berhasil dihapus");
        return redirect()->route('users.index');

    }
}
