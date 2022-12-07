@extends('layouts.back')
@section('title','Permissions - Kopiku')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h4 class="fw-bold pt-3"><span class="text-muted fw-light">Management / </span> Assign Users</h4>
        <div class="card mb-5">
            <div class="card-header">
                <h5>
                    Assign Users
                </h5>
                <div class="alert alert-info">
                    <i class='bx bx-info-circle'></i> Pilih user berdasarkan email
                </div>
            </div>

            <div class="card-body">
                <form action="{{route('assign-users.store')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">User</label>
                        <input class="form-control" name="email" list="dataUsers" id="exampleDataList" placeholder="Cari berdasarkan email" />
                        <datalist id="dataUsers">
                            @forelse ($users as $user)
                                <option value="{{$user->email}}"></option>
                            @empty
                                <option disabled selected>Tidak ada users</option>
                            @endforelse
                        </datalist>
                        @error('email')
                        <div class="form-text text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="roles" class="form-label">Roles</label>
                        <div class="form-group">
                            @foreach ($roles as $role)
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" name="roles[]" type="checkbox" id="{{$role->id}}"
                                    value="{{$role->id}}">
                                <label class="form-check-label" for="{{$role->id}}">{{$role->name}}</label>
                            </div>
                            @endforeach
                        </div>
                        @error('roles')
                        <div class="form-text text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Assign</button>
                </form>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">
                Daftar Assign Users
            </h5>
            <div class="card-body">
                <div class="table-responsive mb-5">
                    <table class="table p-4" id="table-data">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Roles</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$user->name}}</td>
                                <td>
                                    {{implode(', ', $user->getRoleNames()->toArray())}}
                                </td>
                                <td>
                                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                        <div class="btn-group" role="group" aria-label="First group">
                                            <a href="{{route('assign-users.edit',['user' => $user->id])}}"
                                                class="btn btn-outline-secondary btn-sm me-2">
                                                <i class="tf-icons bx bx-sync text-warning"></i>
                                            </a>
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
