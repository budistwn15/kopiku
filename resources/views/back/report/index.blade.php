@extends('layouts.back')
@section('title', 'Transaction - Kopiku')

@section('content')
<div class="row">
    <h4 class="fw-bold pt-3"><span class="text-muted fw-light">Laporan / </span> Semua</h4>
    <div class="col-md-12 mb-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('report.check') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="from" class="form-label">Dari</label>
                        <input type="date" name="from" id="from" class="form-control form-control-lg">
                    </div>
                    <div class="mb-4">
                        <label for="to" class="form-label">Hingga</label>
                        <input type="date" name="to" id="to" class="form-control form-control-lg">
                    </div>
                    <button type="submit" class="btn btn-primary">Cek Laporan</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
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
                                    <a href="{{$transaction->midtrans_url}}" target="_blank"><span
                                            class="badge bg-label-warning">Waiting</span></a>
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
