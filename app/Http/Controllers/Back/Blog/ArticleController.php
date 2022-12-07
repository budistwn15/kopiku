<?php

namespace App\Http\Controllers\Back\Blog;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::get();
        return view('back.blog.articles.index',[
            'articles'  => $articles
        ]);
    }

    public function create(Article $article)
    {
        $categories = Category::get();
        return view('back.blog.articles.create',[
            'categories' => $categories,
            'article' => $article
        ]);
    }

    public function store(ArticleRequest $request)
    {

        $request->validate([
            'thumbnail' => ['required','file','image','mimes:png,jpg','max:5000']
        ],[
            'thumbnail.required' => 'Thumbnail harus diisi',
            'thumbnail.file' => 'Format berbentuk file',
            'thumbnail.image' => 'Hanya gambar yang diizinkan',
            'thumbnail.mimes' => 'Format yang didukung hanya png dan jpg',
            'thumbnail.max' => 'Maksimal 5mb',
        ]);

        $user_id = Auth()->user()->id;
        $slug = Str::slug($request->title);

        if($request->hasFile('thumbnail')){
            $extFile = $request->thumbnail->getClientOriginalExtension();
            $namaFile = $slug.'-'.time().'.'.$extFile;
            $request->thumbnail->storeAs('public/assets/images/articles', $namaFile);
        }else{
            $namaFile = 'default_article.jpg';
        }

        $article = Article::create([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'thumbnail' => $namaFile,
            'user_id' => $user_id
        ]);
        $categories = Category::find($request->categories);

        $article->categories()->sync($categories);

        Alert::success('Sukses',"Artikel {$request->title} berhasil ditambahkan");
        return redirect()->route('articles.index');
    }

    public function edit(Article $article)
    {
        $categories = Category::get();
        return view('back.blog.articles.edit',[
            'article' => $article,
            'categories' => $categories
        ]);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $user_id = Auth()->user()->id;
        $slug = Str::slug($request->title);

        if ($request->hasFile('thumbnail')) {
            $extFile = $request->thumbnail->getClientOriginalExtension();
            $namaFile = $slug . '-' . time() . '.' . $extFile;
            $request->thumbnail->storeAs('public/assets/images/articles', $namaFile);
        } else {
            $namaFile = $article->thumbnail;
        }

        $article->update([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'thumbnail' => $namaFile,
            'user_id' => $user_id
        ]);
        $categories = Category::find($request->categories);

        $article->categories()->sync($categories);

        Alert::success('Sukses', "Artikel {$request->title} berhasil diubah");
        return redirect()->route('articles.index');
    }

    public function destroy(Article $article){
        $article->delete();
        Alert::success('Sukses', "Artikel {$article->title} berhasil dihapus");
        return redirect()->route('articles.index');
    }
}
