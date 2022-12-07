@extends('layouts.back')
@section('title','Types - Kopiku')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h4 class="fw-bold pt-3"><span class="text-muted fw-light">Coffee / </span> Types</h4>
        <div class="card mb-5">
            <h5 class="card-header">
                Edit Tipe <span class="text-danger fw-bold">{{$type->name}}</span>
            </h5>
            <div class="card-body">
                <form action="{{route('types.update',['type' => $type->id])}}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    @include('back.coffees.types.form',['button' => 'Edit'])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
