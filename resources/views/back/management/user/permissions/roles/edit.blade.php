@extends('layouts.back')
@section('title','Role - Kopiku')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h4 class="fw-bold pt-3"><span class="text-muted fw-light">Management / </span> Roles</h4>
        <div class="card">
            <h5 class="card-header">
                Edit Role
            </h5>
            <div class="card-body">
                <form action="{{route('roles.update',['role' => $role->id])}}" method="post">
                    @method('put')
                    @csrf
                    @include('back.management.user.permissions.roles.form',[
                    'button' => 'Edit'
                    ])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
