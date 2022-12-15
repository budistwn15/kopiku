@extends('layouts.front')
@section('activeHome','active border-bottom-orange')
@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-6 mb-5">
            <p class="fw-bold text-secondary-orange">KOPIKU</p>
            <h2 class="display-1">Enjoy Your <br> Morning Cofee</h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Enim, sed sit non sit. Sed purus
                nunc, amet facilisis viverra facilisi amet felis, tortor.</p>
            <div class="btn-group mt-4" role="group">
                <a href="{{ route('catalogs.index') }}" class="btn btn-dark">Get Your Now</a>
                <button type="button" class="btn btn-white">Reservation</button>
            </div>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('assets/images/hero.png') }}" alt="Kopiku" class="img-fluid">
        </div>
    </div>
</div>

<section class="hero bg-dark text-white p-5">
    <div class="container">
        <div class="row my-4">
            <div class="col-md-6">
                <figure>
                    <blockquote class="blockquote blockquote-kopiku">
                        <p>“Kopi yang baik akan selalu menemukan penikmatnya.”</p>
                    </blockquote>
                    <figcaption class="blockquote-footer blockquote-kopiku">
                        <cite title="Source Title">Ben</cite>
                    </figcaption>
                </figure>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <img src="{{asset('assets/images/background/hero.png')}}" class="img-fluid" alt="Kopiku">
            </div>
            <div class="col-md-6 ms-5">
                <p class="text-secondary-orange">Our Coffee</p>
                <h3 class="fw-bold display-5">Choose Your Favorite Coffee</h3>
                <p class="lead text-secondary">More than 100 types of coffee are ready to serve by our professionals.
                </p>
                <ul class="nav mb-4">
                    @foreach ($coffees as $coffee)
                        <li class="nav-item">
                            <a class="nav-link text-secondary-orange" aria-current="page"
                                href="{{route('catalogs.show',['coffee' => $coffee->code])}}">{{ $coffee->name }}</a>
                        </li>
                    @endforeach
                </ul>
                <a href="{{ route('catalogs.index') }}" class="text-decoration-none text-white mt-4">More Menu <i
                        class="bi bi-arrow-right-short"></i></a>
            </div>
        </div>
    </div>
</section>

<section class="products p-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <h2 class="fw-bold display-5"><span class="text-secondary-orange">Weekend</span> Special Products</h2>
                <p>Check out our daily special product that you can get with 20% OFF!</p>
            </div>
        </div>
        <div class="row">
            @foreach ($coffees as $coffee)
                <div class="col-md-3 mb-5">
                    <div class="card">
                        <img src="{{asset('storage/assets/images/coffees/'.$coffee->thumbnail)}}" class="card-img-top" alt="Kopiku"
                            style="background-size:cover;background-repeat:no-repeat;background-position:center">
                        <div class="card-body">
                            <h5 class="fw-bold">@currency($coffee->price)</h5>
                            <a href="{{route('catalogs.show',['coffee' => $coffee->code])}}" class="text-decoration-none text-dark"><p class="fw-bold m-0">{{ $coffee->name }}</p></a>
                            <p class="m-0">{{ $coffee->tagline }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="about p-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{asset('assets/images/background/about.png')}}" alt="Kopiku" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h2 class="fw-bold text-center display-5 mb-5">We Are About The Quality Of Our Products</h2>
                <div class="card mb-3 border-0">
                    <div class="row">
                        <div class="col-md-2">
                            <i class="bi bi-collection" style="font-size: 32px"></i>
                        </div>
                        <div class="col-md-8">
                            <h5 class="card-title"> Active Community</h5>
                            <p class="card-text">You Can Reach Out Whenever You Want</p>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 border-0">
                    <div class="row">
                        <div class="col-md-2">
                            <i class="bi bi-collection" style="font-size: 32px"></i>
                        </div>
                        <div class="col-md-8">
                            <h5 class="card-title"> Premium Quality</h5>
                            <p class="card-text">A premium quality coffee is what our customers deserve</p>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 border-0">
                    <div class="row">
                        <div class="col-md-2">
                            <i class="bi bi-collection" style="font-size: 32px"></i>
                        </div>
                        <div class="col-md-8">
                            <h5 class="card-title"> Best Product Design</h5>
                            <p class="card-text">We worked a lot to make a great experience</p>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 border-0">
                    <div class="row">
                        <div class="col-md-2">
                            <i class="bi bi-collection" style="font-size: 32px"></i>
                        </div>
                        <div class="col-md-8">
                            <h5 class="card-title"> The best material</h5>
                            <p class="card-text">Our product is made by premium materials</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container p-5 mb-5 bg-dark rounded">
    <div class="row">
        <div class="col-md-12 text-white text-center">
            <h2 class="fw-bold display-5">Join and get %25 <span class="text-secondary-orange">OFF!</span></h2>
            <p>Subscribe to our newslatter and get %25 OFF discount code.</p>
            <div class="row my-4">
                <div class="col-md-10">
                    <input type="email" name="email" id="email" class="form-control form-control-lg"
                        placeholder="Your Email Address">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn d-grid gap-2 btn-lg text-white"
                        style="background-color: #D66853">Subscribe</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
