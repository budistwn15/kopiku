@extends('layouts.back')
@section('title','Articles - Kopiku')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h4 class="fw-bold pt-3"><span class="text-muted fw-light">Blog / </span> Articles</h4>
        <div class="card">
            <h5 class="card-header">
                Tambah Artikel
            </h5>
           <div class="card-body">
                <form action="{{route('articles.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @include('back.blog.articles.form',['button' => 'Tambah'])
                </form>
           </div>
        </div>
    </div>
</div>
@endsection
