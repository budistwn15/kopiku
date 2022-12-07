@extends('layouts.back')
@section('title','Assign Permissions - Kopiku')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h4 class="fw-bold pt-3"><span class="text-muted fw-light">Management / </span> Assign Users</h4>
        <div class="card">
            <h5 class="card-header">
                Sync Roles untuk user {{$user->name}}
            </h5>
            <div class="card-body">
                <form action="{{route('assign-users.update',['user' => $user->id])}}" method="post">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">User</label>
                        <input class="form-control" name="email" id="email"
                            placeholder="Cari berdasarkan email" value="{{$user->email}}" readonly>
                            @error('email')
                                <div class="form-text text-danger">{{$message}}</div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="roles" class="form-label">Roles</label>
                        <div class="form-group">
                            @foreach ($roles as $role)
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" name="roles[]" type="checkbox" id="{{$role->id}}" value="{{$role->id}}" {{$user->roles()->find($role->id) ? 'checked' : ''}}>
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
    </div>
</div>
@endsection
