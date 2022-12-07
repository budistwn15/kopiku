@extends('layouts.back')
@section('title','Assign Permissions - Kopiku')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h4 class="fw-bold pt-3"><span class="text-muted fw-light">Management / </span> Permissions</h4>
        <div class="card">
            <h5 class="card-header">
                Sync Permission
            </h5>
            <div class="card-body">
                <form action="{{route('assign-permissions.update',['role' => $role->id])}}" method="post">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" id="role" class="form-select">
                            <option disabled selected>Pilih Role</option>
                            @foreach ($roles as $item)
                            <option value="{{$item->id}}" {{$role->id == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
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
                                    value="{{$permission->id}}" {{$role->permissions()->find($permission->id) ? 'checked' : ''}}>
                                <label class="form-check-label" for="{{$permission->id}}">{{$permission->name}}</label>
                            </div>
                            @endforeach
                        </div>
                        @error('permissions')
                        <div class="form-text text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Sync</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
