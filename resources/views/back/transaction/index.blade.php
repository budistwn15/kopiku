@extends('layouts.back')
@section('title', 'Transaction - Kopiku')

@section('content')
<div class="row">
    <h4 class="fw-bold pt-3"><span class="text-muted fw-light">Transaksi / </span> Semua</h4>
    <div class="col-md-6 mb-4">
        <div class="card p-4">
            <h5 class="card-title">Status Transaksi</h5>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="card bg-success">
                        <div class="card-body text-center">
                            <h5 class="card-title text-white">Berhasil</h5>
                            <h3 class="text-white">5</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card bg-warning">
                        <div class="card-body text-center">
                            <h5 class="card-title text-white">Menunggu</h5>
                            <h3 class="text-white">5</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card p-4">
            <h5 class="card-title">Status Pengiriman</h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card bg-danger">
                        <div class="card-body text-center">
                            <h5 class="card-title text-white">Belum</h5>
                            <h3 class="text-white">5</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card bg-warning">
                        <div class="card-body text-center">
                            <h5 class="card-title text-white">Dikirim</h5>
                            <h3 class="text-white">5</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card bg-success">
                        <div class="card-body text-center">
                            <h5 class="card-title text-white">Diterima</h5>
                            <h3 class="text-white">5</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-12">
        <div class="card p-4">
            <h4 class="card-title">Semua transaksi</h4>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped py-4" id="table-data">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal Transaksi</th>
                                <th>Kode Transaksi</th>
                                <th>Pelanggan</th>
                                <th>Status Pemesanan</th>
                                <th>Status Pengiriman</th>
                                <th>Total Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$transaction->created_at->format("d M Y H:i")}}</td>
                                    <td>{{$transaction->order_code}}</td>
                                    <td>{{$transaction->user->name}}</td>
                                    <td>
                                        @if($transaction->payment_status == "waiting")
                                            <a href="{{$transaction->midtrans_url}}" target="_blank"><span class="badge bg-label-warning">Waiting</span></a>
                                        @elseif($transaction->payment_status == "paid")
                                            <span class="badge bg-label-success">Paid</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($transaction->delivery_status == "waiting")
                                            <span class="badge bg-label-danger">Waiting</span>
                                        @elseif ($transaction->delivery_status == "sent")
                                            <span class="badge bg-label-warning">Dikirim</span>
                                        @elseif ($transaction->delivery_status == "received")
                                            <span class="badge bg-label-success">Diterima</span>
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $total_pembayaran = 0;
                                        @endphp
                                        @foreach ($transaction->orderCoffees as $item)
                                        @php
                                            $total = $item->coffee->price * $item->qty;
                                            $total_pembayaran += $total;
                                        @endphp
                                        @endforeach
                                        @currency($total_pembayaran)
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-info mb-3">Detail</a>
                                        <a href="#" class="btn btn-success mb-3">Kirim</a>
                                        <a href="#" class="btn btn-warning mb-3">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
