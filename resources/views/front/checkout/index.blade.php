@extends('layouts.front')
@section('content')
<div class="container mt-5 mb-5">
    <div class="row mb-4">
        <div class="col-md-12 mb-4 text-center">
            <h2 class="fw-bold display-5"><span class="text-secondary-orange">Pesanan</span> Kopiku</h2>
            <p>Sungguh menakjubkan bagaimana dunia mulai berubah melalui secangkir kopi</p>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-8">
            <div class="card p-4 mb-3">
                <h3 class="fw-bold">Detail Pemesanan</h3>
                <form action="{{route('checkouts.store',['order' => $order->order_code])}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="order_code" class="form-label disabled">Kode Order</label>
                        <input type="text" id="order_code" class="form-control form-control-lg"
                            value="{{old('order_code') ?? $order->order_code}}" disabled>
                        @error('order_code')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

            </div>
            <div class="card p-4">
                <h3 class="fw-bold">Detail Penerima</h3>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" name="name" id="name" class="form-control form-control-lg"
                        value="{{old('name') ?? $order->user->name}}" placeholder="Masukkan Nama Lengkap">
                    @error('name')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Nomor Handphone</label>
                    <input type="text" name="phone" id="phone" class="form-control form-control-lg"
                        value="{{old('phone') ?? $order->user->phone}}" placeholder="Masukkan Nomor Handphone">
                    @error('phone')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea name="address" id="address" class="form-control form-control-lg"
                        placeholder="Alamat Lengkap Pengiriman">{{old('address') ?? $order->user->address}}</textarea>
                    @error('address')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Provinsi</label>
                            <select class="form-select provinsi-tujuan form-select-lg" name="province_destination">
                                <option selected disabled>Pilih Provinsi</option>
                                @foreach ($provinces as $province => $value)
                                <option value="{{ $province  }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Kota / Kabupaten</label>
                            <select class="form-select kota-tujuan form-select-lg" name="city_destination">
                                <option selected disabled>Pilih Kota/Kabupaten</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Ekspedisi</label>
                            <select class="form-select form-select-lg kurir" name="courier">
                                <option selected disabled>Pilih Ekspedisi</option>
                                <option value="jne">JNE</option>
                                <option value="pos">POS</option>
                                <option value="tiki">TIKI</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="weight" class="form-label">Berat (<code>g</code>)</label>
                            @php
                            $totalBerat = 0;
                            @endphp
                            @foreach ($order_coffees as $item)
                            @php
                                $totalBerat += $item->coffee->weight * $item->qty;
                            @endphp
                            @endforeach
                            <input type="number" name="weight" id="weight" class="form-control form-control-lg"
                                value="{{$totalBerat}}" readonly>
                            @error('weight')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-dark btn-lg btn-cek" data-id="{{ $order->order_code }}">Confirm</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4">
                <h3>Pesanan Kamu</h3>
                <table class="table table-borderless">
                    @php
                    $totalPrice = 0;
                    $totalWeight = 0;
                    @endphp
                    @foreach ($order_coffees as $item)
                    @php
                    $subTotalPrice = $item->qty * $item->coffee->price;
                    $totalPrice += $subTotalPrice;

                    $totalWeight += $item->coffee->weight;
                    @endphp
                    <tr>
                        <td>{{$item->coffee->name}}</td>
                        <td>{{$item->qty}}*</td>
                        <td>{{$item->coffee->weight*$item->qty}} <code>g</code></td>
                        <td>@currency($subTotalPrice)</td>
                    </tr>
                    @endforeach
                </table>
                <div class="text-end mb-4 border-top border-3 py-3">
                    <p class="fw-bold">Rincian Pembayaran</p>
                    <div class="d-flex justify-content-between">
                        <h6>Total Harga </h6>
                        <h6 class="fw-bold" id="totalHarga">@currency($totalPrice)</h6>
                        <input type="hidden" name="total_harga" id="total_harga" value="{{$totalPrice}}">
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6>Ongkos Kirim</h6>
                        <h6 class="fw-bold" id="eksped">Rp. 0</h6>
                        <input type="hidden" name="ongkos_kirim" id="ongkos_kirim">
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6>Biaya Layanan</h6>
                        <h6 class="fw-bold" id="biayaLayanan">Rp. 10.000</h6>
                    </div>
                    <h2 class="fw-bold text-secondary-orange" id="pembayaran_total">@currency($totalPrice)</h2>
                    <input type="hidden" name="total_pembayaran" id="total_pembayaran">
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-dark btn-lg" type="submit" id="btnPayment" disabled>Lanjut Pembayaran</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
@section('script')
    <script src="{{asset('assets/js/ongkir.js')}}"></script>
@endsection
