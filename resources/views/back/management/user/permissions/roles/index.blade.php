@extends('layouts.back')
@section('title','Role - Kopiku')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h4 class="fw-bold pt-3"><span class="text-muted fw-light">Management / </span> Roles</h4>
        <div class="card mb-5">
            <h5 class="card-header">
                Tambah Role
            </h5>
            <div class="card-body">
                <form action="{{route('roles.store')}}" method="post">
                @csrf
                @include('back.management.user.permissions.roles.form',[
                    'button' => 'Tambah'
                ])
                </form>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">
                Daftar Roles
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
                        @forelse ($roles as $role)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$role->name}}</td>
                                <td>{{$role->guard_name}}</td>
                                <td>{{$role->created_at->format("d F Y")}}</td>
                                <td>
                                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                        <div class="btn-group" role="group" aria-label="First group">
                                                <a href="{{route('roles.edit',['role' => $role->id])}}" class="btn btn-outline-secondary btn-sm me-2">
                                                    <i class="tf-icons bx bx-edit text-warning"></i>
                                                </a>
                                                <form action="{{route('roles.destroy',['role' => $role->id])}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-secondary btn-sm btn-hapus" title="Hapus Role" data-name="{{$role->name}}"
                                                        data-table="role">
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
                                    <div class="alert alert-danger">Tidak ada role yang tersedia</div>
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
