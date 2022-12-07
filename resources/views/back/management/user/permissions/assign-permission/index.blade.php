@extends('layouts.back')
@section('title','Permissions - Kopiku')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h4 class="fw-bold pt-3"><span class="text-muted fw-light">Management / </span> Assign Permissions</h4>
        <div class="card mb-5">
            <h5 class="card-header">
                Assign Permission
            </h5>
            <div class="card-body">
                <form action="{{route('assign-permissions.store')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" id="role" class="form-select">
                            <option disabled selected>Pilih Role</option>
                            @foreach ($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                        @error('role')
                        <div class="form-text text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="permissions" class="form-label">Permissions</label>
                        <div class="form-group">
                            @foreach ($permissions as $permission)
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" name="permissions[]" type="checkbox" id="{{$permission->id}}"
                                    value="{{$permission->id}}">
                                <label class="form-check-label" for="{{$permission->id}}">{{$permission->name}}</label>
                            </div>
                            @endforeach
                        </div>
                        @error('permissions')
                        <div class="form-text text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Assign</button>
                </form>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">
                Daftar Assign Permissions
            </h5>
            <div class="card-body">
                <div class="table-responsive mb-5">
                    <table class="table p-4" id="table-data">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Guard</th>
                                <th>Permissions</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$role->name}}</td>
                                <td>{{$role->guard_name}}</td>
                                <td>
                                    {{implode(', ', $role->getPermissionNames()->toArray())}}
                                </td>
                                <td>
                                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                        <div class="btn-group" role="group" aria-label="First group">
                                            <a href="{{route('assign-permissions.edit',['role' => $role->id])}}"
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
