@extends('Pembeli.master')
@section('title','registrasi')
@section('conten')
<form method="POST" action="{{ route('pembeli.register') }}">
    @csrf

    <div class="mb-3">
        <label for="email" class="form-label">Nama lengkap</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ Session::get('name') }}" required autofocus>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="{{ Session::get('email') }}" required autofocus>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Kata Sandi</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <button type="submit" class="btn btn-primary w-100">Masuk</button>
</form>

<div class="text-center mt-3">
    <small>sudah punya akun? <a href="{{route('pembeli.login')}}">Login</a></small>
</div>
@endsection