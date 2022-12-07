@extends('layouts.back')
@section('title','User - Kopiku')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h4 class="fw-bold pt-3"><span class="text-muted fw-light">Management /</span> Users</h4>
        <a href="{{route('users.create')}}" class="btn btn-primary mb-4">Tambah User</a>
        <div class="card">
            <h5 class="card-header">
                Daftar Users
            </h5>
            <div class="card-body">
                <div class="table-responsive mb-5">
                    <table class="table table-striped py-4" id="table-data">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Email Verified</th>
                                <th>Avatar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if ($user->email_verified_at)
                                    <i class='bx bxs-check-shield text-success'></i>
                                    Verified
                                    @else
                                    -
                                    @endif
                                </td>
                                <td>
                                    <img src="{{asset('assets/images/users/'.$user->avatar) ? $user->avatar : '-'}}"
                                        class="rounded-circle" width="25">
                                </td>
                                <td>
                                    <div class="btn-toolbar demo-inline-spacing" role="toolbar" aria-label="Toolbar with button groups">
                                        <div class="btn-group" role="group" aria-label="First group">
                                            <form action="{{route('users.destroy',['user' => $user->id])}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-secondary btn-hapus" title="Hapus User"
                                                    data-name="{{$user->name}}" data-table="user">
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
