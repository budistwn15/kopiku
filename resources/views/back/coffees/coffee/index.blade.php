@extends('layouts.back')
@section('title','Coffees - Kopiku')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h4 class="fw-bold pt-3"><span class="text-muted fw-light">Coffees / </span> Coffee</h4>
        <a href="{{route('coffees.create')}}" class="btn btn-primary mb-4">Tambah Kopi</a>
        <div class="card">
            <div class="card-header">
                <h5 class="card-header">
                    Daftar Kopi
                </h5>
                <div class="alert alert-info">
                    <i class='bx bx-info-circle'></i> Apabila stok kopi < 10 harap segera isi stok
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive mb-5">
                    <table class="table p-4" id="table-data">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Tagline</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Berat</th>
                                <th>Rasa</th>
                                <th>Kategori</th>
                                <th>Thumbnail</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coffees as $coffee)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><code>{{$coffee->code}}</code></td>
                                <td>{{$coffee->name}}</td>
                                <td>{{$coffee->tagline}}</td>
                                <td>
                                    @if ($coffee->stock < 10) <span class="text-danger">{{$coffee->stock}}</span>
                                        @else
                                        <span class="text-success">{{$coffee->stock}}</span>
                                        @endif
                                </td>
                                <td>@currency($coffee->price)</td>
                                <td>{{$coffee->weight}} <span class="text-danger">g</span></td>
                                <td>{{$coffee->taste}}</td>
                                <td>
                                    @foreach ($coffee->types as $type)
                                    <a href="#">
                                        <span class="badge bg-primary">{{$type->name}}</span>
                                    </a>
                                    @endforeach
                                </td>
                                <td>
                                    <img src="{{asset('storage/assets/images/coffees/'.$coffee->thumbnail)}}" class="img-fluid"
                                        width="25">
                                </td>
                                <td>
                                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                        <div class="btn-group" role="group" aria-label="First group">
                                            <a href="{{route('coffees.edit',['coffee' => $coffee->id])}}"
                                                class="btn btn-outline-secondary btn-sm me-2">
                                                <i class="tf-icons bx bx-edit text-warning"></i>
                                            </a>
                                            <form action="{{route('coffees.destroy',['coffee' => $coffee->id])}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-secondary btn-sm btn-hapus"
                                                    title="Hapus Coffee" data-name="{{$coffee->name}}" data-table="coffee">
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
