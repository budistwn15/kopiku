<?php

namespace App\Http\Controllers\Back;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index()
    {
        return view('back.profile.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $slug = Str::slug($request->name);

        if ($request->hasFile('avatar')) {
            $extFile = $request->avatar->getClientOriginalExtension();
            $namaFile = $slug . '-' . time() . '.' . $extFile;
            $request->avatar->storeAs('public/assets/images/users/', $namaFile);
        } else {
            $namaFile = auth()->user()->avatar;
        }

        User::find(auth()->user()->id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'avatar' => $namaFile,
        ]);

        Alert::success('Sukses', "Profile berhasil diperbaharui");
        return redirect()->back();
    }

    public function destroy()
    {
        $terms = request()->input('terms');
        if($terms){
            $user = User::find(auth()->user()->id);
            $user->delete();
            Auth::logout();
            Alert::success("Sukses", "Selamat tinggal, anda berhasil menghapus akun anda");
            return redirect()->route('welcome');
        }else{
            Alert::info("Info","Anda belum mengkonfirmasi penonaktifan akun");
            return redirect()->back();
        }
    }
}
