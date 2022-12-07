@extends('layouts.front')
@section('activeCatalog','active border-bottom-orange')
@section('content')

<section class="products p-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <h2 class="fw-bold display-5"><span class="text-secondary-orange">Weekend</span> Special Products</h2>
                <p>Check out our daily special product that you can get with 20% OFF!</p>
                <ul class="nav nav-pills justify-content-center mt-5">
                    <li class="nav-item">
                        <a class="nav-link text-dark" aria-current="page"
                            href="{{route('catalogs.all')}}">All</a>
                    </li>
                    @foreach ($types as $item)
                    <li class="nav-item">
                        <a class="nav-link ms-3 {{$item->id == $type->id ? 'bg-dark text-white' :'text-dark'}}" href="{{route('catalogs.type',['type' => $item->slug])}}">{{$item->name}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            @foreach ($type->coffees as $coffee)
            <div class="col-md-3 mb-5">
                <div class="card border-0 shadow-sm">
                    <a href="{{route('catalogs.show',['coffee' => $coffee->code])}}">
                        <img src="{{asset('storage/assets/images/coffees/'.$coffee->thumbnail)}}" class="card-img-top" alt="Kopiku"
                            style="background-size:cover;background-repeat:no-repeat;background-position:center">
                    </a>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="fw-bold my-auto">@currency($coffee->price)</h5>
                            <form action="{{route('catalogs.cart',['coffee' => $coffee->code])}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-dark" name="cartOne" value="CartOne">
                                    <i class="bi bi-cart-plus"></i>
                                </button>
                            </form>
                        </div>
                        <a href="{{route('catalogs.show',['coffee' => $coffee->code])}}"
                            class="fw-bold m-0 text-dark text-decoration-none">{{$coffee->name}}</a>
                        <p class="m-0">{{$coffee->tagline}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>



@endsection
