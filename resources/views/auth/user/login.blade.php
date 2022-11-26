@extends('layouts.front')

@section('content')
<div class="container mt-4 mb-5">
    <div class="row">
        <div class="col-md-6">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('assets/images/background/image.png')}}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>About Coffee</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sociis morbi in neque arcu
                                facilisis.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('assets/images/background/image.png')}}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>About Coffee</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sociis morbi in neque arcu
                                facilisis.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('assets/images/background/image.png')}}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>About Coffee</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sociis morbi in neque arcu
                                facilisis.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-md-6 mt-4 px-5">
            <h2 class="fw-bold display-5">Hello Again!</h2>
            <p>Selamat datang di Kopiku. Silahkan untuk login terlebih dahulu untuk memesan kopi yang kamu inginkan</p>
            <div class="d-grid gap-2 my-4">
                <a href="{{route('user.login')}}" class="btn btn-light fw-bold" style="background-color: #fff !important">
                    <img src="{{asset('assets/images/icon/flat-color-icons_google.png')}}" alt="">
                    Masuk Menggunakan Google
                </a>
            </div>
            <hr class="my-4 border-secondary hr-text" data-content="atau">
            <form action="{{route('login')}}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group">
                        <input type="email" name="email" id="email" class="form-control form-control-lg"
                            placeholder="example@gmail.com">
                        <span class="input-group-text bg-white" id="basic-addon1"><i class="bi bi-envelope"></i></span>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control form-control-lg"
                            placeholder="**********">
                        <span class="input-group-text bg-white" id="basic-addon1"><i class="bi bi-lock"></i></span>
                    </div>
                </div>
                <div class="d-flex justify-content-between mb-4">
                    <div class="form-check">
                        <input type="checkbox" name="remember_me" id="remember_me" class="form-check-input">
                        <label for="remember_me" class="form-check-label">Ingat Saya</label>
                    </div>
                    <a href="#" class="text-decoration-none fw-bold" style="color: #D66853">Lupa Kata Sandi?</a>
                </div>
                <div class="d-grid gap-2 mb-2">
                    <button type="submit" class="btn btn-dark btn-lg">
                        Login
                    </button>
                </div>
            </form>
            <p class="text-center mb-5">Tidak punya akun? <a href="#" class="text-decoration-none"
                    style="color: #D66853">Daftar</a>
            </p>
        </div>
    </div>
</div>
@endsection
