@extends('halaman.master')
@section('title','Halaman utama')
@section('content')
<section id="hero" class="hero section light-background">
    <div class="container">
        <div class="row gy-4 justify-content-center justify-content-lg-between">
            <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">Nikmati Bakso Bakar<br>Lezat & Menggoda</h1>
                <p data-aos="fade-up" data-aos-delay="100">Bakso bakar dengan cita rasa khas, bumbu meresap,
                    dan aroma yang menggugah selera. Cocok untuk semua suasana!</p>
                <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                    <a href="{{route('menu')}}" class="btn-get-started">Lihat Menu</a>
                    {{-- <a href="#gallery" class="btn-get-started">Tentang kami</a> --}}
                </div>
            </div>
            <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                <img src="{{ asset('Yummy') }}/assets/img/bakso bakar.jpg" class="img-fluid animated"
                    alt="">
            </div>
        </div>
    </div>
</section>
@endsection