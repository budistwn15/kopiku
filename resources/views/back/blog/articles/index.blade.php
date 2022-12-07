@extends('layouts.back')
@section('title','Articles - Kopiku')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h4 class="fw-bold pt-3"><span class="text-muted fw-light">Blog / </span> Articles</h4>
        <a href="{{route('articles.create')}}" class="btn btn-primary mb-4">Tambah Artikel</a>
        <div class="card">
            <h5 class="card-header">
                Daftar Artikel
            </h5>
            <div class="card-body">
                <div class="table-responsive mb-5">
                    <table class="table p-4" id="table-data">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Judul</th>
                                <th>Slug</th>
                                <th>Kategori</th>
                                <th>Penulis</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$article->title}}</td>
                                <td>{{$article->slug}}</td>
                                <td>
                                    @foreach ($article->categories as $category)
                                    <a href="#">
                                        <span class="badge bg-primary">{{$category->name}}</span>
                                    </a>
                                    @endforeach
                                </td>
                                <td>{{$article->user->name}}</td>
                                <td>
                                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                        <div class="btn-group" role="group" aria-label="First group">
                                            <a href="{{route('articles.edit',['article' => $article->id])}}"
                                                class="btn btn-outline-secondary btn-sm me-2">
                                                <i class="tf-icons bx bx-edit text-warning"></i>
                                            </a>
                                            <form action="{{route('articles.destroy',['article' => $article->id])}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-secondary btn-sm btn-hapus"
                                                    title="Hapus Artikel" data-name="{{$article->name}}" data-table="article">
                                                    <i class="tf-icons bx bx-trash text-danger"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
