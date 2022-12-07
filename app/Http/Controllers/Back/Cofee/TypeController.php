<?php

namespace App\Http\Controllers\Back\Cofee;

use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\TypeRequest;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class TypeController extends Controller
{
    public function index(Type $type)
    {
        $types = Type::withCount('coffees')->orderBy('name','asc')->get();
        return view('back.coffees.types.index',[
            'types' => $types,
            'type' => $type,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:5', 'string'],
            'description' => ['required'],
            'thumbnail' => ['required', 'file', 'image', 'mimes:png,jpg', 'max:5000']
        ], [
            'name.required' => 'Nama harus diisi',
            'description.required' => 'Deskripsi harus diisi',
            'name.min' => 'Minimal 5 karakter',
            'thumbnail.required' => 'Thumbnail harus diisi',
            'thumbnail.file' => 'Format berbentuk file',
            'thumbnail.image' => 'Hanya gambar yang diizinkan',
            'thumbnail.mimes' => 'Format yang didukung hanya png dan jpg',
            'thumbnail.max' => 'Maksimal 5mb',
        ]);

        $slug = Str::slug($request->name);

        if ($request->hasFile('thumbnail')) {
            $extFile = $request->thumbnail->getClientOriginalExtension();
            $namaFile = $slug . '-' . time() . '.' . $extFile;
            $request->thumbnail->storeAs('public/assets/images/types', $namaFile);
        }

        Type::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'thumbnail' => $namaFile,
        ]);

        Alert::success('Sukses', "Type {$request->name} berhasil ditambahkan");
        return back();
    }

    public function edit(Type $type)
    {
        return view('back.coffees.types.edit',[
            'type' => $type
        ]);
    }

    public function update(Type $type, Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:5', 'string'],
            'description' => ['required'],
            'thumbnail' => ['file', 'image', 'mimes:png,jpg', 'max:5000','nullable']
        ], [
            'name.required' => 'Nama harus diisi',
            'description.required' => 'Deskripsi harus diisi',
            'name.min' => 'Minimal 5 karakter',
            'thumbnail.file' => 'Format berbentuk file',
            'thumbnail.image' => 'Hanya gambar yang diizinkan',
            'thumbnail.mimes' => 'Format yang didukung hanya png dan jpg',
            'thumbnail.max' => 'Maksimal 5mb',
        ]);

        $slug = Str::slug($request->name);

        if ($request->hasFile('thumbnail')) {
            $extFile = $request->thumbnail->getClientOriginalExtension();
            $namaFile = $slug . '-' . time() . '.' . $extFile;
            $request->thumbnail->storeAs('public/assets/images/types', $namaFile);
        }else{
            $namaFile = $type->thumbnail;
        }

        $type->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'thumbnail' => $namaFile,
        ]);

        Alert::success('Sukses', "Type {$request->name} berhasil diubah");
        return redirect()->route('types.index');
    }

    public function destroy(Type $type)
    {
        $type->delete();
        Alert::success('Sukses', "Type {$type->name} berhasil dihapus");
        return redirect()->route('types.index');
    }
}
