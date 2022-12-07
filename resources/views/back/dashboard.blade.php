@extends('layouts.back')
@section('title', 'Dashboard - Kopiku')

@section('content')
<div class="row">
    <div class="col-lg-6 mb-4 order-0">
        <div class="card mb-5">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Selamat Datang {{auth()->user()->name}}! 🎉</h5>
                        <p class="mb-4">
                           Disini kamu dapat melihat transaksi dan mengatur manajemen untuk website kopiku
                        </p>
                        <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Transaksi</a>
                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img src="{{asset('themes/assets/img/illustrations/man-with-laptop-light.png')}}" height="140"
                            alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png" />
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title m0 me-2 border-bottom border-3 border-dark py-3">
                    Transaction
                </h5>
            </div>
            <div class="card-body">
                <ul class="p-0 m-0">
                    @foreach ($list_transactions as $item )
                        <li class="d-flex mb-4 pb-1">
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="text-muted d-block mb-1"><code>{{$item->order_code}}</code></small>
                                    <h6 class="mb-0">{{$item->user->name}} </h6>
                                    @if ($item->payment_status == "waiting")
                                        <span class="badge bg-label-warning">Waiting</span>
                                    @elseif ($item->payment_status == "paid")
                                        <span class="badge bg-label-success">Paid</span>
                                    @endif
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    @php
                                        $pembayaran_total = 0
                                    @endphp
                                    @foreach ($item->order_coffees as $item)
                                        @php
                                            $pembayaran_harga = $item->coffee->price * $item->qty;
                                            $pembayaran_total += $pembayaran_harga;
                                        @endphp
                                    @endforeach
                                    <h6 class="mb-0">@currency($pembayaran_total)</h6>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-4 order-1">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <button class="btn btn-warning"><i class='bx bx-transfer'></i></button>
                            </div>
                        </div>
                        <span>Total Transaksi</span>
                        <h4 class="card-title mb-1">{{$transaction_count}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <button class="btn btn-success"><i class='bx bxs-wallet'></i></button>
                            </div>
                        </div>
                        <span>Total Pembayaran</span>
                        <h4 class="card-title mb-1">@currency($total_pembayaran)</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <button class="btn btn-danger"><i class='bx bx-group'></i></button>
                            </div>
                        </div>
                        <span>Total Pelanggan</span>
                        <h4 class="card-title mb-1">{{$pelanggan_count}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <button class="btn btn-primary"><i class='bx bx-group'></i></button>
                            </div>
                        </div>
                        <span>Total Kasir</span>
                        <h4 class="card-title mb-1">{{$kasir_count}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <button class="btn btn-info"><i class='bx bx-notepad'></i></button>
                            </div>
                        </div>
                        <span>Total Artikel</span>
                        <h4 class="card-title mb-1">{{$article_count}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <button class="btn btn-dark"><i class='bx bx-label'></i></button>
                            </div>
                        </div>
                        <span>Total Kategori</span>
                        <h4 class="card-title mb-1">{{$category_count}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <button class="btn btn-primary"><i class='bx bx-comment'></i></button>
                            </div>
                        </div>
                        <span>Total Komentar</span>
                        <h4 class="card-title mb-1">{{$comment_count}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <button class="btn btn-success"><i class='bx bx-coffee'></i></button>
                            </div>
                        </div>
                        <span>Total Kopi</span>
                        <h4 class="card-title mb-1">{{$coffee_count}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <button class="btn btn-warning"><i class='bx bx-sticker'></i></button>
                            </div>
                        </div>
                        <span>Total Tipe</span>
                        <h4 class="card-title mb-1">{{$type_count}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <button class="btn btn-danger"><i class='bx bxs-star-half'></i></button>
                            </div>
                        </div>
                        <span>Total Reviews</span>
                        <h4 class="card-title mb-1">{{0}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card mb-5">
            <div class="card-header">
                <h5 class="card-title m0 me-2 border-bottom border-3 border-dark py-3">
                    Coffee Trends
                </h5>
            </div>
            <div class="card-body">
                <ul class="p-0 m-0">
                    @foreach ($coffee_trends as $trend)
                        <li class="d-flex mb-4 pb-1">
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="text-muted d-block mb-1">{{$trend->code}}</small>
                                    <h6 class="mb-0">{{$trend->name}}</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">{{$trend->total}} Kopi Terjual</h6>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
{{-- <div class="row mb-4">
    <div class="col-md-12">
        <div class="card mb-5">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr class="table-primary">
                                <th>#</th>
                                <th>Order Code</th>
                                <th>Tanggal Transaksi</th>
                                <th>Status Pembayaran</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$order->order_code}}</td>
                                    <td><small>{{$order->created_at->format("d F y")}}</small></td>
                                    <td>
                                        @if ($order->payment_status == "waiting")
                                            <a href="{{$order->midtrans_url}}" target="_blank" class="text-primary">Waiting</a>
                                            @elseif ($order->payment_status == "paid")
                                            <a href="#" class="text-success">Paid</a>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            @if ($order->payment_status == "waiting")
                                                <a href="{{$order->midtrans_url}}" class="btn btn-outline-primary">Bayar Sekarang</a>
                                            @endif
                                            <a href="{{route('transactions.show',['order' => $order->order_code])}}" class="btn btn-outline-primary">Detail</a>
                                        </div>
                                    </td>
                                </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
@section('script')
<script>

</script>
@endsection
