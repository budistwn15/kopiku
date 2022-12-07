<!Doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Kopiku</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Meddon&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card p-4 my-4 border-0 shadow-sm">
                    <img src="{{asset('assets/images/payment_success.png')}}" height="400">
                    <div class="card-body text-center mt-4">
                        <small class="fw-bold text-secondary-orange">WHAT A DAY !</small>
                        <h4 class="fw-bold mb-3">Berhasil Melakukan Pembayaran</h4>
                        <a href="http://127.0.0.1:8000/kopimin/dashboard" class="btn rounded text-white px-4" style="background-color: #D66853 !important; border-radius:80px !important">Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script> --}}
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="{{asset('assets/js/index.js')}}"></script>
    @include('sweetalert::alert')

    @yield('script')
</body>

</html>
