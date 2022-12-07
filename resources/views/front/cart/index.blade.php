@extends('layouts.front')
@section('content')
<script>
    let var = 2;
</script>
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12 mb-4 text-center">
            <h2 class="fw-bold display-5"><span class="text-secondary-orange">Keranjang</span> Kopiku</h2>
            <p>Sungguh menakjubkan bagaimana dunia mulai berubah melalui secangkir kopi</p>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-8">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Pilih Semua
                </label>
            </div>
            <div class="border-bottom border-5 py-2 mb-3"></div>
            @forelse ($carts as $cart)
                <div class="container">
                    <div class="row">
                        <div class="col-md-1">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="checkCoffee{{$loop->iteration}}">
                            </div>
                        </div>
                        <div class="col-md-11 g-0">
                            <div class="card px-4 mb-3">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img src="{{asset('storage/assets/images/coffees/'.$cart->coffee->thumbnail)}}" class="img-fluid rounded my-2" alt="...">
                                    </div>
                                    <div class="col-md-10">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <h5 class="card-title" id="coffeeName{{$loop->iteration}}">{{$cart->coffee->name}}</h5>
                                                <div class="dropdown">
                                                    <button class="btn border-0" type="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="bi bi-three-dots-vertical"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <form action="{{route('carts.destroy',['cart' => $cart->id])}}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="btn btn-outline-secondary btn-sm btn-hapus dropdown-item" title="Hapus Kopi"
                                                                    data-name="{{$cart->coffee->name}}" data-table="cart">Hapus
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <p class="d-none" id="codeCoffee{{$loop->iteration}}">{{$cart->coffee->code}}</p>
                                            <p class="card-text fw-bold">@currency($cart->coffee->price)</p>
                                            <p class="d-none" id="harga{{$loop->iteration}}">{{$cart->coffee->price}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="jumlah{{$loop->iteration}}" placeholder="name@example.com"
                                                value="{{$cart->jumlah}}" data-bs-toggle="tooltip" data-bs-title="Default tooltip" readonly>
                                            <label for="jumlah">Jumlah</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-bottom border-5 py-2 mb-3"></div>
            @empty

            @endforelse
        </div>
        <div class="col-md-4">
            <div class="card p-4">
                <h4 class="fw-bold">Ringkasan Belanja</h4>
                <form action="{{route('carts.store')}}" method="post">
                    @csrf
                    @for ($i=1;$i<=$cart_count;$i++)
                        <div class="row">
                            <div class="col-md-4">
                                <p id="nameCoffee{{$i}}" class="mt-1"></p>
                                <input type="hidden" name="code[]" id="code{{$i}}">
                            </div>
                            <div class="col-md-4">
                                <input type="number" name="qty[]" id="qtyCoffee{{$i}}" class="form-control d-none" readonly>
                            </div>
                            <div class="col-md-4">
                                <p id="priceCoffee{{$i}}"></p>
                            </div>
                        </div>
                    @endfor
                    <div class="border-bottom border-2 mb-3"></div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="fw-bold">Total</p>
                        </div>
                        <div class="col-md-4">
                            <p class="fw-bold" id="totalQty"></p>
                        </div>
                        <div class="col-md-4">
                            <p class="fw-bold text-sm" id="totalHarga">Rp. 0</p>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-dark btn-lg" type="submit">Beli</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<span class="d-none" id="cartCount">{{$cart_count}}</span>
@endsection

@section('script')
    <script>
        let count = document.getElementById("cartCount").innerHTML;
        let total = 0;
        let totalQty = 0;
        let countCheck = 0;
        let sumCheck = 0;

        $(document).ready(function () {
            for(let i=1; i<= count; i++){
                $(`#checkCoffee${i}`).click(function (event) {
                if (this.checked) {
                    countCheck = this.checked ? 1 : 0;
                    sumCheck += countCheck;
                    let name = document.getElementById(`coffeeName${i}`).innerHTML;
                    let jumlah = $(`#jumlah${i}`).val();
                    let harga = document.getElementById(`harga${i}`).innerHTML;
                    let code = document.getElementById(`codeCoffee${i}`).innerHTML;
                    let sumPriceCoffee = parseInt(jumlah) * parseInt(harga);
                    let qty = $(`#qtyCoffee${i}`);

                    total += sumPriceCoffee;
                    totalQty += parseInt(jumlah);


                    document.getElementById(`nameCoffee${i}`).innerHTML = name;
                    qty.removeClass('d-none');
                    qty.val(jumlah);
                    document.getElementById(`priceCoffee${i}`).innerHTML = formatRupiah(sumPriceCoffee,"Rp. ");
                    document.getElementById(`totalHarga`).innerHTML = formatRupiah(total,"Rp. ");
                    document.getElementById(`totalQty`).innerHTML = `${totalQty} (Kopi)`;
                    $(`#code${i}`).val(code);
                }else{
                    let jumlah = $(`#jumlah${i}`).val();
                    let harga = document.getElementById(`harga${i}`).innerHTML;
                    let sumPriceCoffee = parseInt(jumlah) * parseInt(harga);

                    total -= sumPriceCoffee;
                    totalQty -= parseInt(jumlah);

                    if(totalQty < 0){
                        totalQty = 0;
                    }

                    document.getElementById(`nameCoffee${i}`).innerHTML = '';
                    $(`#qtyCoffee${i}`).addClass('d-none').val(0);
                    $(`#code${i}`).addClass('d-none').val(0);
                    document.getElementById(`priceCoffee${i}`).innerHTML = '';
                    document.getElementById(`totalHarga`).innerHTML = formatRupiah(total,"Rp. ");
                    document.getElementById(`totalQty`).innerHTML = `${totalQty} (Kopi)`;
                }
            });
        }
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
