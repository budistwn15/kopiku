<?php

namespace App\Http\Controllers\Back\Cofee;

use App\Models\Type;
use App\Models\Coffee;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class CoffeeController extends Controller
{
    public function index()
    {
        $coffees = Coffee::get();
        return view('back.coffees.coffee.index',[
            'coffees' => $coffees
        ]);
    }

    public function create(Coffee $coffee)
    {
        $types = Type::get();
        return view('back.coffees.coffee.create',[
            'types' => $types,
            'coffee' => $coffee
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => ['required','max:8','min:8','unique:coffees,code'],
            'name' => ['required','min:5','string'],
            'tagline' => ['required','min:5','string'],
            'stock' => ['required','numeric'],
            'price' => ['required','numeric'],
            'weight' => ['required','numeric'],
            'stock' => ['required','numeric'],
            'taste' => ['required','array'],
            'types' => ['required'],
            'description' => ['required'],
            'thumbnail' => ['required','file', 'image', 'mimes:png,jpg', 'max:5000']
        ],[
            'code.required' => 'Kode harus diisi',
            'code.max' => 'Maksimal 8 Karakter',
            'code.min' => 'Minimal 8 Karakter',
            'code.unique' => 'Kode sudah digunakan',
            'name.required' => 'Nama harus diisi',
            'name.min' => 'Minimal 5 karakter',
            'tagline.required' => 'Tagline harus diisi',
            'tagline.min' => 'Minimal 5 karakter',
            'price.required' => 'Harga harus diisi',
            'price.numeric' => 'Harga harus diisi dengan angka',
            'weight.required' => 'Berat harus diisi',
            'weight.numeric' => 'Berat harus diisi dengan angka',
            'stock.required' => 'Stok harus diisi',
            'stock.numeric' => 'Stok harus diisi dengan angka',
            'taste.required' => 'Rasa harus diisi',
            'types.required' => 'Tipe harus diisi',
            'description.required' => 'Deskripsi harus diisi',
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
            $request->thumbnail->storeAs('public/assets/images/coffees', $namaFile);
        }

        $coffee = Coffee::create([
            'code' => $request->code,
            'name' => $request->name,
            'tagline' => $request->tagline,
            'stock' => $request->stock,
            'price' => $request->price,
            'weight' => $request->weight,
            'taste' => implode(',', $request->taste),
            'description' => $request->description,
            'thumbnail' => $namaFile
        ]);

        $types = Type::find($request->types);

        $coffee->types()->sync($types);

        Alert::success('Sukses', "Kopi {$request->name} berhasil ditambahkan");
        return redirect()->route('coffees.index');

    }

    public function edit(Coffee $coffee)
    {
        $types = Type::get();
        return view('back.coffees.coffee.edit',[
            'coffee' => $coffee,
            'types' => $types
        ]);
    }

    public function update(Request $request, Coffee $coffee)
    {
        $request->validate([
            'name' => ['required', 'min:5', 'string'],
            'tagline' => ['required', 'min:5', 'string'],
            'stock' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'weight' => ['required', 'numeric'],
            'stock' => ['required', 'numeric'],
            'taste' => ['required', 'array'],
            'types' => ['required'],
            'description' => ['required'],
            'thumbnail' => ['nullable', 'file', 'image', 'mimes:png,jpg', 'max:5000']
        ], [
            'name.required' => 'Nama harus diisi',
            'name.min' => 'Minimal 5 karakter',
            'tagline.required' => 'Tagline harus diisi',
            'tagline.min' => 'Minimal 5 karakter',
            'price.required' => 'Harga harus diisi',
            'price.numeric' => 'Harga harus diisi dengan angka',
            'weight.required' => 'Berat harus diisi',
            'weight.numeric' => 'Berat harus diisi dengan angka',
            'stock.required' => 'Stok harus diisi',
            'stock.numeric' => 'Stok harus diisi dengan angka',
            'taste.required' => 'Rasa harus diisi',
            'types.required' => 'Tipe harus diisi',
            'description.required' => 'Deskripsi harus diisi',
            'thumbnail.file' => 'Format berbentuk file',
            'thumbnail.image' => 'Hanya gambar yang diizinkan',
            'thumbnail.mimes' => 'Format yang didukung hanya png dan jpg',
            'thumbnail.max' => 'Maksimal 5mb',
        ]);

        $slug = Str::slug($request->name);

        if ($request->hasFile('thumbnail')) {
            $extFile = $request->thumbnail->getClientOriginalExtension();
            $namaFile = $slug . '-' . time() . '.' . $extFile;
            $request->thumbnail->storeAs('public/assets/images/coffees', $namaFile);
        }else{
            $namaFile = $coffee->thumbnail;
        }

        $coffee->update([
            'name' => $request->name,
            'tagline' => $request->tagline,
            'stock' => $request->stock,
            'price' => $request->price,
            'weight' => $request->weight,
            'taste' => implode(',', $request->taste),
            'description' => $request->description,
            'thumbnail' => $namaFile
        ]);

        $types = Type::find($request->types);

        $coffee->types()->sync($types);

        Alert::success('Sukses', "Kopi {$request->name} berhasil diubah");
        return redirect()->route('coffees.index');
    }

    public function destroy(Coffee $coffee)
    {
        $coffee->delete();
        Alert::success('Sukses', "Kopi {$coffee->name} berhasil dihapus");
        return redirect()->route('coffees.index');
    }
}
