@extends('layouts.back')
@section('title','Categories - Kopiku')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h4 class="fw-bold pt-3"><span class="text-muted fw-light">Blog / </span> Categories</h4>
        <div class="card mb-5">
            <h5 class="card-header">
                Tambah Kategori
            </h5>
            <div class="card-body">
                <form action="{{route('categories.store')}}" method="post">
                    @csrf
                    @include('back.blog.categories.form',['button' => 'Tambah'])
                </form>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">
                Daftar Kategori
            </h5>
           <div class="card-body">
            <div class="table-responsive mb-5">
                <table class="table p-4" id="table-data">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Jumlah Artikel</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->description}}</td>
                            <td>{{$category->articles_count}}</td>
                            <td>
                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        <a href="{{route('categories.edit',['category' => $category->id])}}"
                                            class="btn btn-outline-secondary btn-sm me-2">
                                            <i class="tf-icons bx bx-edit text-warning"></i>
                                        </a>
                                        <form action="{{route('categories.destroy',['category' => $category->id])}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-secondary btn-sm btn-hapus"
                                                title="Hapus Category" data-name="{{$category->name}}" data-table="category">
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
