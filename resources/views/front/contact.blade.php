@extends('layouts.front')
@section('activeContact','active border-bottom-orange')
@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12 mb-5 text-center">
            <h2 class="fw-bold display-5"><span class="text-secondary-orange">Hubungi</span> Kami</h2>
            <p>Apabila ada hal yang ingin dipertanyakan, silahkan untuk menghubungi kami!</p>
        </div>
        <div class="col-md-12 mb-3">
            <div class="card p-3 border-0">
                <div class="card-body">
                    <form action="{{ route('contact.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Masukkan Email" value="{{ old('email') }}">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="Masukkan Nama Lengkap" value="{{ old('name') }}">
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subjek <span class="text-danger">*</span></label>
                        <input type="text" name="subject" id="subject" class="form-control form-control-lg" placeholder="Masukkan Subjek" {{ old('subject') }}>
                        @error('subject')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Pesan <span class="text-danger">*</span></label>
                        <textarea name="message" id="message" class="form-control form-control-lg"></textarea>
                        @error('message')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
