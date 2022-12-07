@extends('layouts.back')
@section('title','Categories - Kopiku')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h4 class="fw-bold pt-3"><span class="text-muted fw-light">Blog / </span> Categories</h4>
        <div class="card mb-5">
            <h5 class="card-header">
                Edit Kategori
            </h5>
            <div class="card-body">
                <form action="{{route('categories.update',['category' => $category->id])}}" method="post">
                    @csrf
                    @method('put')
                    @include('back.blog.categories.form',['button' => 'Edit'])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
