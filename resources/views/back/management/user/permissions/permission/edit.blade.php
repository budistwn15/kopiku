@extends('layouts.back')
@section('title','Permissions - Kopiku')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h4 class="fw-bold pt-3"><span class="text-muted fw-light">Management / </span> Permissions</h4>
        <div class="card">
            <h5 class="card-header">
                Edit Permission
            </h5>
            <div class="card-body">
                <form action="{{route('permissions.update',['permission' => $permission->id])}}" method="post">
                    @method('put')
                    @csrf
                    @include('back.management.user.permissions.permission.form',[
                    'button' => 'Edit'
                    ])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
