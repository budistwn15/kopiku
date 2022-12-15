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
                                facilisis.
                            </p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('assets/images/background/image.png')}}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>About Coffee</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sociis morbi in neque arcu
                                facilisis.
                            </p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('assets/images/background/image.png')}}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>About Coffee</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sociis morbi in neque arcu
                                facilisis.
                            </p>
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
        <div class="col-md-6 mt-4  px-5">
            <h2 class="fw-bold display-5">Register!</h2>
            <p>Selamat datang di Kopiku. Silahkan untuk daftar terlebih dahulu untuk memesan kopi yang kamu inginkan</p>
            <div class="d-grid gap-2 my-4">
                <a href="{{ route('user.login') }}" class="btn btn-light fw-bold" style="background-color: #fff !important">
                    <img src="{{asset('assets/images/icon/flat-color-icons_google.png')}}" alt="">
                    Daftar Menggunakan Google
                </a>
            </div>
            <hr class="my-4 border-secondary hr-text" data-content="atau">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" id="name" class="form-control form-control-lg"
                        placeholder="Budi Setiawan" value="{{ old('name') }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control form-control-lg"
                        placeholder="example@gmail.com" value="{{ old('email') }}">
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control form-control-lg"
                        placeholder="**********">
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-lg"
                        placeholder="**********">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Nomor Handphone</label>
                    <input type="text" name="phone" id="phone" class="form-control form-control-lg" placeholder="Masukkan Nomor Handphone" value="{{ old('phone') }}">
                    @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea name="address" id="address" class="form-control form-control-lg"
                        placeholder="example@gmail.com">{{ old('alamat') }}</textarea>
                        @error('address')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="d-grid gap-2 mb-2">
                    <button type="submit" class="btn btn-dark btn-lg">
                        Register
                    </button>
                </div>
            </form>
            <p class="text-center mb-5">Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none"
                    style="color: #D66853">Masuk</a>
            </p>
        </div>
    </div>
</div>
@endsection
