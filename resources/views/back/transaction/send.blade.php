@extends('layouts.back')
@section('title', 'Transaction - Kopiku')

@section('content')
<div class="row mb-4">
    <h4 class="fw-bold pt-3"><span class="text-muted fw-light">Transaksi / </span> Semua</h4>
    <div class="col-md-12">
        <div class="card p-4">
            <h4 class="card-title">Kirim Kopi</h4>
            <div class="card-body">
                <form action="{{ route('transaction.update',['order' => $order->order_code]) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="resi" class="form-label">Resi</label>
                        <input type="text" name="resi" id="resi" class="form-control form-control-lg">
                    </div>
                    <div class="mb-3">
                        <label for="ekspedisi" class="form-label">Ekspedisi</label>
                        <input type="text" name="ekspedisi" id="ekspedisi" class="form-control form-control-lg" value="{{ old('ekspedisi') ?? $detail->ekspedisi }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="#" class="form-label fw-bold">Detail Pelanggan</label>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" name="name" id="name" class="form-control form-control-lg" value="{{ old('name') ?? $detail->name }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Nomor Handphone</label>
                                <input type="text" name="phone" id="phone" class="form-control form-control-lg" value="{{ old('phone') ?? $detail->phone }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="address" class="form-label">Alamat</label>
                                <input type="text" name="address" id="address" class="form-control form-control-lg"
                                    value="{{ old('address') ?? $detail->address }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="provinsi" class="form-label">Provinsi</label>
                                <input type="text" name="provinsi" id="provinsi" class="form-control form-control-lg" value="{{ old('provinsi') ?? $detail->provinsi }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="kota" class="form-label">Kota</label>
                                <input type="text" name="kota" id="kota" class="form-control form-control-lg"
                                    value="{{ old('kota') ?? $detail->kota }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="weight" class="form-label">Berat</label>
                                <input type="text" name="weight" id="weight" class="form-control form-control-lg" value="{{ old('weight') ?? $detail->weight }}" readonly>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
