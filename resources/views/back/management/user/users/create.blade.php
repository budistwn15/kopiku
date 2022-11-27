@extends('layouts.back')
@section('title','User - Kopiku')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Management /</span> Users</h4>
        <div class="card">
            <h5 class="card-header">
                Tambah User
            </h5>
           <div class="card-body">
            <form action="{{route('users.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="Masukkan Nama Lengkap" value="{{old('name')}}">
                    @error('name')
                        <div class="form-text text-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Masukkan Email" value="{{old('email')}}">
                    @error('email')
                        <div class="form-text text-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Masukkan Password">
                    @error('password')
                        <div class="form-text text-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-lg" placeholder="Masukkan Konfirmasi Password">
                    @error('password_confirmation')
                        <div class="form-text text-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
           </div>
        </div>
    </div>
</div>
@endsection
