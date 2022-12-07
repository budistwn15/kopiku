@extends('layouts.back')
@section('title','Articles - Kopiku')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h4 class="fw-bold pt-3"><span class="text-muted fw-light">Blog / </span> Articles</h4>
        <div class="card">
            <h5 class="card-header">
                Edit Artikel <span class="text-danger fw-bold">{{$article->title}}</span>
            </h5>
            <div class="card-body">
                <form action="{{route('articles.update',['article' => $article->id])}}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    @include('back.blog.articles.form',['button' => 'Edit'])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
