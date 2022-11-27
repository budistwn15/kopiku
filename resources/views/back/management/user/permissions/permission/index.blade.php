@extends('layouts.back')
@section('title','Permissions - Kopiku')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h4 class="fw-bold pt-3"><span class="text-muted fw-light">Management / </span> Permissions</h4>
        <div class="card mb-5">
            <h5 class="card-header">
                Tambah Permission
            </h5>
            <div class="card-body">
                <form action="{{route('permissions.store')}}" method="post">
                @csrf
                @include('back.management.user.permissions.permission.form',[
                    'button' => 'Tambah'
                ])
                </form>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">
                Daftar Permissions
            </h5>
            <div class="table-responsive mb-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Guard</th>
                            <th>Create At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($permissions as $permission)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$permission->name}}</td>
                                <td>{{$permission->guard_name}}</td>
                                <td>{{$permission->created_at->format("d F Y")}}</td>
                                <td>
                                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                        <div class="btn-group" role="group" aria-label="First group">
                                                <a href="{{route('permissions.edit',['permission' => $permission->id])}}" class="btn btn-outline-secondary btn-sm me-2">
                                                    <i class="tf-icons bx bx-edit text-warning"></i>
                                                </a>
                                                <form action="{{route('permissions.destroy',['permission' => $permission->id])}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-secondary btn-sm btn-hapus" title="Hapus Permission" data-name="{{$permission->name}}"
                                                        data-table="permission">
                                                        <i class="tf-icons bx bx-trash text-danger"></i>
                                                    </button>
                                                </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="alert alert-danger">Tidak ada permission yang tersedia</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
