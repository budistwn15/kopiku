@extends('layouts.front')
@section('activeCatalog','active border-bottom-orange')
@section('content')

<section class="products p-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
                <h2 class="fw-bold display-5">{{$coffee->name}}</h2>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <ul class="nav">
                            <li class="nav-item ms-2">
                                <i class="bi bi-star-fill text-warning"></i>
                            </li>
                            <li class="nav-item ms-2">
                                <i class="bi bi-star-fill text-warning"></i>
                            </li>
                            <li class="nav-item ms-2">
                               <i class="bi bi-star-fill text-warning"></i>
                            </li>
                            <li class="nav-item ms-2">
                                <i class="bi bi-star-fill text-warning"></i>
                            </li>
                            <li class="nav-item ms-2">
                                <i class="bi bi-star text-warning"></i>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-2 mb-3">
                        <p>In Stock</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        @foreach ($coffee->types as $type)
                            <a href="#"class="badge text-decoration-none text-bg-dark btn-sm mb-3">{{$type->name}}</a>
                        @endforeach
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm">
                            <img src="{{asset('storage/assets/images/coffees/'.$coffee->thumbnail)}}" class="rounded" style="max-height: 600px;background-size:cover;background-repeat:no-repeat;background-position:center">
                        </div>
                    </div>
                    <div class="col-md-4 px-4">
                        <div class="mb-2">
                            <p class="lead fw-bold m-0">Tagline : </p>
                            <p class="lead">{{$coffee->tagline}}</p>
                        </div>
                        <div class="mb-2">
                            <p class="lead fw-bold m-0">Taste : </p>
                            <p class="lead">{{$coffee->taste}}</p>
                        </div>
                        <div class="mb-2">
                            <p class="lead fw-bold m-0">Weight :</p>
                            <p class="lead">{{$coffee->weight}}</p>
                        </div>
                        <div class="mb-2">
                            <p class="lead fw-bold m-0">Delivery : </p>
                            <address class="lead">Budi Setiawan, 77672 Tillman Lane Port Jessica Hawaii 21075 962-379-7191 606.346.9530 x84762
                            </address>
                        </div>
                        <div class="mb-2">
                            <h2 class="fw-bold">@currency($coffee->price)</h2>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <form action="{{route('catalogs.cart',['coffee' => $coffee->code])}}" method="post">
                            @csrf
                            <div class="card p-4">
                                <h5 class="mb-3">Atur jumlah</h5>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <input type="number" name="jumlah" id="jumlah" value="1" class="form-control" min="1">
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mt-2">Stok Total: <span class="fw-bold text-secondary-orange">{{$coffee->stock}}</span></p>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <p>Subtotal</p>
                                        <h4 id="subTotal">@currency($coffee->price)</h4>
                                        <p class="d-none" id="price">{{$coffee->price}}</p>
                                    </div>
                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-dark" type="submit" name="cart" value="Cart">+ Keranjang</button>
                                    <button class="btn btn-outline-dark" type="submit" name="buy" value="Buy">Beli Sekarang</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link text-dark active" id="nav-description-tab" data-bs-toggle="tab" data-bs-target="#nav-description" type="button"
                            role="tab" aria-controls="nav-description" aria-selected="true">Description</button>
                        <button class="nav-link text-dark" id="nav-reviews-tab" data-bs-toggle="tab" data-bs-target="#nav-reviews" type="button"
                            role="tab" aria-controls="nav-reviews" aria-selected="false">Reviews</button>
                        <button class="nav-link text-dark" id="nav-qa-tab" data-bs-toggle="tab" data-bs-target="#nav-qa" type="button"
                            role="tab" aria-controls="nav-qa" aria-selected="false">Q&A</button>
                    </div>
                </nav>
                <div class="tab-content mt-4" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab" tabindex="0">
                        {!!$coffee->description!!}
                    </div>
                    <div class="tab-pane fade" id="nav-reviews" role="tabpanel" aria-labelledby="nav-reviews-tab" tabindex="0">...</div>
                    <div class="tab-pane fade" id="nav-qa" role="tabpanel" aria-labelledby="nav-qa-tab" tabindex="0">...</div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
    <script type="text/javascript">

        $(document).ready(function() {
            $("#jumlah").change(function() {
                let jumlah = $("#jumlah").val();
                let harga = document.getElementById("price").innerHTML;

                // var total = parseInt(harga) * parseInt(jumlah);
                let total = parseInt(jumlah) * parseInt(harga);

                document.getElementById("subTotal").innerHTML = formatRupiah(total, "Rp. ");
            });
        });

        function formatRupiah(angka, prefix){
            let number_string = angka.toString().replace(/[^,\d]/g, ''),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>
@endsection
