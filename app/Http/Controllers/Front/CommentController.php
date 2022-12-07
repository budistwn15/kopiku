<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Reply;
use RealRashid\SweetAlert\Facades\Alert;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $request->validate([
            'body' => ['required','string']
        ]);

        Comment::create([
            'user_id' => auth()->user()->id,
            'article_id' => $article->id,
            'body' => $request->body
        ]);

        Alert::success("Sukses","Berhasil menambahkan komentar");
        return back();
    }

    public function reply(Request $request,  Article $article, Comment $comment )
    {
        $request->validate([
            'body' => ['required', 'string']
        ]);

        Reply::create([
            'article_id' => $comment->article_id,
            'comment_id' => $comment->id,
            'user_id' => auth()->user()->id,
            'body' => $request->body
        ]);

        Alert::success("Sukses", "Berhasil menambahkan komentar");
        return redirect()->route('blogs.show',['article' => $comment->article->slug]);
    }
}
