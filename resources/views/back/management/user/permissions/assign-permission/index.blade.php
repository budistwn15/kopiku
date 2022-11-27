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
                <form action="#" method="post">
                    @csrf
                    @include('back.management.user.permissions.assign-permission.form',[
                    'button' => 'Assign'
                    ])
                </form>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">
                Daftar Assign Permissions
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

                </table>
            </div>
        </div>
    </div>
</div>
@endsection
