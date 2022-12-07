@extends('layouts.back')
@section('title','Coffees - Kopiku')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h4 class="fw-bold pt-3"><span class="text-muted fw-light">Coffees / </span> Coffee</h4>
        <div class="card">
            <h5 class="card-header">
                Edit Kopi <span class="text-danger">{{$coffee->name}}</span>
            </h5>
            <div class="card-body">
                <form action="{{route('coffees.update',['coffee' => $coffee->id])}}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    @include('back.coffees.coffee.form',['button' => 'Edit'])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
