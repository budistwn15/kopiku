<?php

namespace App\Http\Controllers\Back\Blog;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $categories = Category::withCount('articles')->orderBy('name','asc')->get();
        return view('back.blog.categories.index',[
            'categories' => $categories,
            'category' => $category,
        ]);
    }

    public function store(CategoryRequest $request)
    {
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description
        ]);
        Alert::success('Sukses',"Kategori {$request->name} berhasil ditambahkan");
        return back();
    }

    public function edit(Category $category)
    {
        return view('back.blog.categories.edit',[
            'category' => $category
        ]);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description
        ]);

        Alert::success('Sukses', "Kategori {$request->name} berhasil diubah");
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        Alert::success('Sukses', "Kategori {$category->name} berhasil dihapus");
        return back();
    }
}
