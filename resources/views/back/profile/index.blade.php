@extends('layouts.back')
@section('title', 'Profile - Kopiku')

@section('content')
<div class="row">
    <h4 class="fw-bold pt-3"><span class="text-muted fw-light">Profile / </span> {{auth()->user()->name}}</h4>
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">Profile Details</h5>
            <!-- Account -->
            <div class="card-body">
                <form id="formAccountSettings" method="POST" action="{{route('profiles.update')}}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    @if (file_exists("storage/assets/images/users/".auth()->user()->avatar))
                        <img src="{{asset('storage/assets/images/users/'.auth()->user()->avatar)}}"
                            alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                    @else
                        <img src="{{auth()->user()->avatar}}" alt="user-avatar" class="d-block rounded"
                            height="100" width="100" id="uploadedAvatar" />
                    @endif

                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="upload" name="avatar" class="account-file-input" hidden/>
                        </label>

                        <p class="text-muted mb-0">Allowed JPG or PNG. Max size of 5MB</p>
                    </div>
                </div>
            </div>
            <hr class="my-0" />
            <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input class="form-control" type="text" id="name" name="name" value="{{old('name') ?? auth()->user()->name}}" autofocus />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control" type="email" id="email" name="email" value="{{old('email') ?? auth()->user()->email}}" readonly/>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <input class="form-control" type="text" id="address" name="address" value="{{old('address') ?? auth()->user()->address}}" autofocus />
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Nomor Handphone</label>
                        <input class="form-control" type="text" id="phone" name="phone" value="{{old('phone') ?? auth()->user()->phone}}" autofocus />
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card mb-4">
            <h5 class="card-header">Account Details</h5>
            <div class="card-body">
                <form id="formAccountSettings" method="POST" action="#">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="password_old" class="form-label">Password Lama</label>
                        <input class="form-control" type="password" id="password_old" name="password_old" value="{{old('password_old')}}"/>
                    </div>
                    <div class="mb-3">
                        <label for="password_new" class="form-label">Password Baru</label>
                        <input class="form-control" type="password" id="password_new" name="password_new" value="{{old('password_new')}}"/>
                    </div>
                    <div class="mb-3">
                        <label for="password_new_confirmation" class="form-label">Konfirmasi Password Baru</label>
                        <input class="form-control" type="password" id="password_new_confirmation" name="password_new_confirmation" value="{{old('password_new_confirmation')}}"/>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">Delete Account</h5>
            <div class="card-body">
                <div class="mb-3 col-12 mb-0">
                    <div class="alert alert-warning">
                        <h6 class="alert-heading fw-bold mb-1">Apakah Anda yakin ingin menghapus akun Anda??</h6>
                        <p class="mb-0">Setelah Anda menghapus akun Anda, tidak ada jalan untuk kembali. Harap yakin.</p>
                    </div>
                </div>
                <form id="formAccountDeactivation" method="post" action="{{route('profiles.delete')}}">
                    @csrf
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="terms" id="accountActivation" />
                        <label class="form-check-label" for="accountActivation">Saya mengkonfirmasi penonaktifan akun saya</label>
                    </div>
                    <button type="submit" class="btn btn-danger deactivate-account">Nonaktifkan Akun</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
