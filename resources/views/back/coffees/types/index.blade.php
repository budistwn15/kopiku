@extends('layouts.back')
@section('title','Types - Kopiku')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h4 class="fw-bold pt-3"><span class="text-muted fw-light">Coffee / </span> Types</h4>
        <div class="card mb-5">
            <h5 class="card-header">
                Tambah Tipe
            </h5>
            <div class="card-body">
                <form action="{{route('types.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('back.coffees.types.form',['button' => 'Tambah'])
                </form>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">
                Daftar Tipe
            </h5>
            <div class="card-body">
                <div class="table-responsive mb-5">
                    <table class="table p-4" id="table-data">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Thumbnail</th>
                                <th>Jumlah Kopi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($types as $type)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$type->name}}</td>
                                <td>{{$type->description}}</td>
                                <td>
                                    <img src="{{asset('storage/assets/images/types/'.$type->thumbnail)}}" class="img-fluid" width="30">
                                </td>
                                <td>{{$type->coffees_count}}</td>
                                <td>
                                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                        <div class="btn-group" role="group" aria-label="First group">
                                            <a href="{{route('types.edit',['type' => $type->id])}}"
                                                class="btn btn-outline-secondary btn-sm me-2">
                                                <i class="tf-icons bx bx-edit text-warning"></i>
                                            </a>
                                            <form action="{{route('types.destroy',['type' => $type->id])}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-secondary btn-sm btn-hapus"
                                                    title="Hapus Type" data-name="{{$type->name}}" data-table="type">
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
