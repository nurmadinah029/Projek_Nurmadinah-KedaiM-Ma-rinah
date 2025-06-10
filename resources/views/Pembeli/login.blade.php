@extends('Pembeli.master')
@section('title','login')
@section('conten')    
<form method="POST" action="{{ route('pembeli.login') }}">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="{{ Session::get('email') }}" required autofocus>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Kata Sandi</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <button type="submit" class="btn btn-primary w-100">Masuk</button>
    <div class="text-center mt-3">
        <small>belum punya akun? <a href="{{route('pembeli.register')}}">Registrasi</a></small>
    </div>
</form>
@endsection