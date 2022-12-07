@extends('layouts.back')
@section('title','Coffees - Kopiku')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h4 class="fw-bold pt-3"><span class="text-muted fw-light">Coffees / </span> Coffee</h4>
        <div class="card">
            <h5 class="card-header">
                Tambah Kopi
            </h5>
            <div class="card-body">
                <form action="{{route('coffees.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('back.coffees.coffee.form',['button' => 'Tambah'])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
