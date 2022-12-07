<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        $articles = Article::orderByDesc('created_at')->get();
        return view('front.blog.index',[
            'articles' => $articles
        ]);
    }

    public function show(Article $article)
    {
        $comments = Comment::where('article_id', $article->id)->get();
        return view('front.blog.show',[
            'article' => $article,
            'comments' => $comments
        ]);
    }

    public function category(Category $category)
    {
        return view('front.blog.category',[
            'category' => $category
        ]);
    }
}
