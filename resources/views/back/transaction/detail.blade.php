@extends('layouts.back')
@section('title', 'Transaction - Kopiku')

@section('content')
<div class="row">
    <h4 class="fw-bold pt-3"><span class="text-muted fw-light">Transaksi / </span> Detail</h4>
    <div class="col-md-6">
        <div class="card mb-5">
            <div class="card-body">
                <h4 class="card-title fw-bold text-dark">Transaksi Detail</h4>
                <div class="row mb-3">
                    <div class="col-md-6 my-3 text-dark">
                        Order Code
                    </div>
                    <div class="col-md-6">
                        <div class="alert alert-success">
                            {{$order->order_code}}
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 my-3 text-dark">
                        Payment Status
                    </div>
                    <div class="col-md-6">
                        @if($order->payment_status == "paid")
                            <div class="alert alert-success">
                                {{$order->payment_status}}
                            </div>
                        @elseif ($order->payment_status == "waiting")
                        <div class="alert alert-warning">
                            {{$order->payment_status}}
                        </div>
                        @else
                        <div class="alert alert-danger">
                            {{$order->payment_status}}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 my-3 text-dark">
                        Tanggal Transaksi
                    </div>
                    <div class="col-md-6">
                        <div class="alert alert-success">
                            {{$order->created_at->format("d F Y")}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Coffee</th>
                            <th>Harga</th>
                            <th>QTY</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $totalPrice = 0;
                        $qty = 0;
                        @endphp
                        @foreach ($order_coffees as $item)
                        @php
                        $subTotalPrice = $item->qty * $item->coffee->price;
                        $totalPrice += $subTotalPrice;
                        $qty += $item->qty;
                        @endphp
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->coffee->name}}</td>
                            <td>@currency($item->coffee->price)</td>
                            <td>{{$item->qty}}</td>
                            <td>@currency($item->qty * $item->coffee->price)</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="fw-bold text-dark">Total</td>
                            <td class="fw-bold text-dark">{{$qty}}</td>
                            <td class="fw-bold text-dark">@currency($totalPrice)</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title fw-bold text-dark">Pelanggan Detail</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Nomor Handphone</th>
                                <th>Alamat</th>
                                <th>Provinsi</th>
                                <th>Kota</th>
                                <th>Ekspedisi</th>
                                <th>Berat <code>g</code></th>
                                <th>Total Harga</th>
                                <th>Ongkos Kirim</th>
                                <th>Biaya Layanan</th>
                                <th>Total Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $order_detail->name }}</td>
                                <td>{{ $order_detail->phone }}</td>
                                <td>{{ $order_detail->address }}</td>
                                <td>{{ $order_detail->provinsi }}</td>
                                <td>{{ $order_detail->kota }}</td>
                                <td>{{ $order_detail->ekspedisi }}</td>
                                <td>{{ $order_detail->weight }}</td>
                                <td>@currency($order_detail->total_harga)</td>
                                <td>@currency($order_detail->ongkos_kirim)</td>
                                <td>@currency($order_detail->biaya_layanan)</td>
                                <td>@currency($order_detail->total_pembayaran)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
