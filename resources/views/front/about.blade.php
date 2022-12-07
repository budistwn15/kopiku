@extends('layouts.front')
@section('activeAbout','active border-bottom-orange')
@section('content')

<section class="hero bg-dark hero-about">
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-5">
                <figure class="text-white text-center p-5 my-5">
                    <blockquote class="blockquote blockquote-kopiku">
                        <p class="fs-3">“Kopi adalah simbol dari kehidupan ini. Terdapat rasa pahit dan rasa manis.”</p>
                    </blockquote>
                    <figcaption class="blockquote-footer blockquote-kopiku text-white">
                        <cite title="Source Title">Kopiku</cite>
                    </figcaption>
                </figure>
            </div>
        </div>
    </div>
</section>

<div class="container my-5">
    <div class="row p-5">
        <div class="col-md-12 text-center">
            <h2 class="fw-bold">About Kopiku</h2>
            <img src="{{asset('assets/images/logo/Logo About.png')}}" alt="Kopiku" class="img-fluid my-4">
            <p>“Kopiku adalah bisnis berkonsep kemitraan yang tumbuh pesat di Indonesia. Seperti brand pendahulunya
                yakni Foodpedia &
                Pasta Kangen, sistem kemitraan Kopiku selalu menyempurnakan sistem sebelumnya. Kami hadir memberikan
                solusi kepada anda
                yang ingin memulai bisnis Coffee Shop dengan menawarkan banyak keunggulan dibanding brand serupa”</p>
        </div>
    </div>
</div>

<section class="galeri bg-dark text-white p-5 my-5">
    <div class="container">
        <div class="row">
            <h2 class="text-center mb-5">Galeri Kopiku</h2>
            <div class="col-md-4 mb-5">
                <div class="card">
                    <img src="{{asset('assets/images/kopi/2.jpg')}}" class="card-img-top" alt="Kopiku">
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="card">
                    <img src="{{asset('assets/images/kopi/2.jpg')}}" class="card-img-top" alt="Kopiku">
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="card">
                    <img src="{{asset('assets/images/kopi/2.jpg')}}" class="card-img-top" alt="Kopiku">
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="card">
                    <img src="{{asset('assets/images/kopi/2.jpg')}}" class="card-img-top" alt="Kopiku">
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="card">
                    <img src="{{asset('assets/images/kopi/2.jpg')}}" class="card-img-top" alt="Kopiku">
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="card">
                    <img src="{{asset('assets/images/kopi/2.jpg')}}" class="card-img-top" alt="Kopiku">
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container my-5">
    <div class="row p-5">
        <div class="col-md-12 text-center">
            <h2 class="fw-bold">Dari Kami, Untuk Kami</h2>
            <p class="lead">Kami adalah sekelompok mahasiswa Universitas Singaperbangsa Karawang yang tengah menempuh
                semester 7. Kami telah bekerja
                keras membangun sebuah website yang bernama Kopiku. Kami membangun sebuah website, untuk menjalankan
                tugas akhir
                Framework Pemrograman Web.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 mb-5">
            <div class="card border-0 rounded">
                <img src="{{asset('assets/images/profile/Bintang.png')}}" class="card-img-top" alt="Kopiku"
                    style="background-size:cover;background-repeat:no-repeat;background-position:center">
                <div class="card-body text-center">
                    <h5 class="fw-bold m-0">Bintang Selviana</h5>
                    <p class="m-0">1910631170011</p>
                    <p class="m-0">Programmer</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-5">
            <div class="card border-0 rounded">
                <img src="{{asset('assets/images/profile/Budi.png')}}" class="card-img-top" alt="Kopiku"
                    style="background-size:cover;background-repeat:no-repeat;background-position:center">
                <div class="card-body text-center">
                    <h5 class="fw-bold m-0">Budi Setiawan</h5>
                    <p class="m-0">1910631170012</p>
                    <p class="m-0">Programmer</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-5">
            <div class="card border-0 rounded">
                <img src="{{asset('assets/images/profile/Dika.png')}}" class="card-img-top" alt="Kopiku"
                    style="background-size:cover;background-repeat:no-repeat;background-position:center">
                <div class="card-body text-center">
                    <h5 class="fw-bold m-0">Dika Rivanka</h5>
                    <p class="m-0">1910631170175</p>
                    <p class="m-0">UX Designer</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-5">
            <div class="card border-0 rounded">
                <img src="{{asset('assets/images/profile/Fajar.png')}}" class="card-img-top" alt="Kopiku"
                    style="background-size:cover;background-repeat:no-repeat;background-position:center">
                <div class="card-body text-center">
                    <h5 class="fw-bold m-0">Fajar Annaz</h5>
                    <p class="m-0">1910631170018</p>
                    <p class="m-0">UI Designer</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
