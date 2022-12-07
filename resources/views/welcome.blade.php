@extends('layouts.front')
@section('activeHome','active border-bottom-orange')
@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-6">
            <p class="fw-bold text-secondary-orange">KOPIKU</p>
            <h2 class="display-1">Enjoy Your <br> Morning Cofee</h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Enim, sed sit non sit. Sed purus
                nunc, amet facilisis viverra facilisi amet felis, tortor.</p>
            <div class="btn-group mt-4" role="group">
                <button type="button" class="btn btn-dark">Get Your Now</button>
                <button type="button" class="btn btn-white">Reservation</button>
            </div>
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
                    <li class="nav-item">
                        <a class="nav-link text-secondary-orange" aria-current="page" href="#">Cappucino</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Latte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Arabica</a>
                    </li>
                </ul>
                <a href="#" class="text-decoration-none text-white mt-4">More Menu <i
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
                <ul class="nav nav-pills justify-content-center mt-5">
                    <li class="nav-item">
                        <a class="nav-link bg-dark text-white" aria-current="page" href="#">Accessories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">Coffee Bean</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">Boundle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">Apparel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">Apparel Coffee</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mb-5">
                <div class="card">
                    <img src="{{asset('assets/images/kopi/2.jpg')}}" class="card-img-top" alt="Kopiku"
                        style="background-size:cover;background-repeat:no-repeat;background-position:center">
                    <div class="card-body">
                        <h5 class="fw-bold">Rp. 25.000</h5>
                        <p class="fw-bold m-0">Espresso</p>
                        <p class="m-0">Minuman cocok buat kamu</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-5">
                <div class="card">
                    <img src="{{asset('assets/images/kopi/2.jpg')}}" class="card-img-top" alt="Kopiku"
                        style="background-size:cover;background-repeat:no-repeat;background-position:center">
                    <div class="card-body">
                        <h5 class="fw-bold">Rp. 25.000</h5>
                        <p class="fw-bold m-0">Espresso</p>
                        <p class="m-0">Minuman cocok buat kamu</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-5">
                <div class="card">
                    <img src="{{asset('assets/images/kopi/2.jpg')}}" class="card-img-top" alt="Kopiku"
                        style="background-size:cover;background-repeat:no-repeat;background-position:center">
                    <div class="card-body">
                        <h5 class="fw-bold">Rp. 25.000</h5>
                        <p class="fw-bold m-0">Espresso</p>
                        <p class="m-0">Minuman cocok buat kamu</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-5">
                <div class="card">
                    <img src="{{asset('assets/images/kopi/2.jpg')}}" class="card-img-top" alt="Kopiku"
                        style="background-size:cover;background-repeat:no-repeat;background-position:center">
                    <div class="card-body">
                        <h5 class="fw-bold">Rp. 25.000</h5>
                        <p class="fw-bold m-0">Espresso</p>
                        <p class="m-0">Minuman cocok buat kamu</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-5">
                <div class="card">
                    <img src="{{asset('assets/images/kopi/2.jpg')}}" class="card-img-top" alt="Kopiku"
                        style="background-size:cover;background-repeat:no-repeat;background-position:center">
                    <div class="card-body">
                        <h5 class="fw-bold">Rp. 25.000</h5>
                        <p class="fw-bold m-0">Espresso</p>
                        <p class="m-0">Minuman cocok buat kamu</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-5">
                <div class="card">
                    <img src="{{asset('assets/images/kopi/2.jpg')}}" class="card-img-top" alt="Kopiku"
                        style="background-size:cover;background-repeat:no-repeat;background-position:center">
                    <div class="card-body">
                        <h5 class="fw-bold">Rp. 25.000</h5>
                        <p class="fw-bold m-0">Espresso</p>
                        <p class="m-0">Minuman cocok buat kamu</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-5">
                <div class="card">
                    <img src="{{asset('assets/images/kopi/2.jpg')}}" class="card-img-top" alt="Kopiku"
                        style="background-size:cover;background-repeat:no-repeat;background-position:center">
                    <div class="card-body">
                        <h5 class="fw-bold">Rp. 25.000</h5>
                        <p class="fw-bold m-0">Espresso</p>
                        <p class="m-0">Minuman cocok buat kamu</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-5">
                <div class="card">
                    <img src="{{asset('assets/images/kopi/2.jpg')}}" class="card-img-top" alt="Kopiku"
                        style="background-size:cover;background-repeat:no-repeat;background-position:center">
                    <div class="card-body">
                        <h5 class="fw-bold">Rp. 25.000</h5>
                        <p class="fw-bold m-0">Espresso</p>
                        <p class="m-0">Minuman cocok buat kamu</p>
                    </div>
                </div>
            </div>
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
                            <h5 class="card-title"> Active Community</h5>
                            <p class="card-text">You Can Reach Out Whenever You Want</p>
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
