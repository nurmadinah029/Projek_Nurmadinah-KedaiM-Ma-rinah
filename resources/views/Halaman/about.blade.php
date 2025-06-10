@extends('Halaman.master')
@section('title','About me')
@section('content')
<section id="about" class="about section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Tentang Kedai Ma’rina<br></h2>
        <p><span>Pelajari Lebih Lanjut</span> <span class="description-title">Tentang Kedai Ma’rina</span></p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-4">
            <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ asset('Yummy') }}/assets/img/kedai penjualan.jpg" class="img-fluid mb-4"
                    alt="">
                <div class="book-a-table">
                    <h3>Nomor WatsApp</h3>
                    <p>+62 87878923884</p>
                </div>
            </div>
            <div class="col-lg-5" data-aos="fade-up" data-aos-delay="250">
                <div class="content ps-0 ps-lg-5">
                    <p class="fst-italic">
                        Kedai Ma’rinah – Surga Bakso Bakar dan Bakso Kemass!
                    </p>
                    <ul>
                        <li><i class="bi bi-check-circle-fill"></i> <span>Woyyyyyyy! Di Kedai Ma’rinah, kita
                                nggak main-main: bakso bakar yang hangat dan gurih siap memanjakan lidah. Tapi
                                tunggu dulu, ada juga bakso kemass yang bikin nagih banget!

                                Bakso bakr kami disajikan dengan kuah spesial yang bikin suasana makin mantap.
                                Kalau mau yang beda, cobain bakso kemass – teksturnya lembut, rasanya mantap,
                                dan cocok banget buat makan rame-rame.

                                Nggak cuma bakso, di sini juga ada minuman segar yang nyegerin tenggorokan. Dari
                                es teh manis, es jeruk, sampai jus buah, semua ada! Datanglah ke Kedai Ma’rinah,
                                rasakan sendiri kelezatan bakso bakar dan bakso kemass yang legendaris
                                ini.</span></li>
                    </ul>


                    <div class="position-relative mt-4">
                        <img src="{{ asset('Yummy') }}/assets/img/kedai penjualan.jpg" class="img-fluid"
                            alt="">
                        <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8"
                            class="glightbox pulsating-play-btn"></a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>
@endsection