@extends('Halaman.master')
@section('title','menu')
@section('content')
<section id="menu" class="menu section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>daftar Menu</h2>
        <p><span>Daftar </span> <span class="description-title">Menu</span></p>
    </div><!-- End Section Title -->
    <div class="container">
        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-starters">
                    <h4>Makanan</h4>
                </a>
            </li><!-- End tab nav item -->
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-breakfast">
                    <h4>Minuman</h4>
                </a><!-- End tab nav item -->
            </li>
        </ul>
        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
            <div class="tab-pane fade active show" id="menu-starters">
                <div class="tab-header text-center">
                    <p>Menu</p>
                    <h3>Makan</h3>
                </div>
                <div class="row gy-5">
                    {{-- ============== menu ==================== --}}
                    @foreach ($menu as $m)
                        <div class="col-lg-4 menu-item">
                            <a href="assets/img/menu/menu-item-1.png" class="glightbox">
                                <img src="{{ asset('storage/menu/' . $m->photo) }}"
                                    class="menu-img img-fluid" alt="{{ $m->name }}">
                            </a>
                            <h4>{{ $m->name }}</h4>
                            <p class="ingredients">
                                {{ $m->description }}
                            </p>
                            <p class="price">
                                Rp {{ number_format($m->price, 0, ',', '.') }}
                            </p>
                            <a href="{{route('detail',$m->id)}}" class="btn btn-primary mt-2">
                               Detail 
                            </a>
                        </div><!-- Menu Item -->
                    @endforeach
                    {{-- ============== end ==================== --}}
                </div>
            </div><!-- End Starter Menu Content -->
            <div class="tab-pane fade" id="menu-breakfast">
                <div class="tab-header text-center">
                    <p>Menu</p>
                    <h3>Minuman</h3>
                </div>
                <div class="row gy-5">
                    <div class="col-lg-4 menu-item">
                        <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img
                                src="{{ asset('Yummy') }}/assets/img/menu/menu-item-1.png"
                                class="menu-img img-fluid" alt=""></a>
                        <h4>Magnam Tiste</h4>
                        <p class="ingredients">
                            Lorem, deren, trataro, filede, nerada
                        </p>
                        <p class="price">
                            $5.95
                        </p>
                    </div><!-- Menu Item -->
                    <div class="col-lg-4 menu-item">
                        <a href="assets/img/menu/menu-item-2.png" class="glightbox"><img
                                src="{{ asset('Yummy') }}/assets/img/menu/menu-item-2.png"
                                class="menu-img img-fluid" alt=""></a>
                        <h4>Aut Luia</h4>
                        <p class="ingredients">
                            Lorem, deren, trataro, filede, nerada
                        </p>
                        <p class="price">
                            $14.95
                        </p>
                    </div><!-- Menu Item -->
                    <div class="col-lg-4 menu-item">
                        <a href="assets/img/menu/menu-item-3.png" class="glightbox"><img
                                src="{{ asset('Yummy') }}/assets/img/menu/menu-item-3.png"
                                class="menu-img img-fluid" alt=""></a>
                        <h4>Est Eligendi</h4>
                        <p class="ingredients">
                            Lorem, deren, trataro, filede, nerada
                        </p>
                        <p class="price">
                            $8.95
                        </p>
                    </div><!-- Menu Item -->
                    <div class="col-lg-4 menu-item">
                        <a href="assets/img/menu/menu-item-4.png" class="glightbox"><img
                                src="{{ asset('Yummy') }}/assets/img/menu/menu-item-4.png"
                                class="menu-img img-fluid" alt=""></a>
                        <h4>Eos Luibusdam</h4>
                        <p class="ingredients">
                            Lorem, deren, trataro, filede, nerada
                        </p>
                        <p class="price">
                            $12.95
                        </p>
                    </div><!-- Menu Item -->

                    <div class="col-lg-4 menu-item">
                        <a href="assets/img/menu/menu-item-5.png" class="glightbox"><img
                                src="{{ asset('Yummy') }}/assets/img/menu/menu-item-5.png"
                                class="menu-img img-fluid" alt=""></a>
                        <h4>Eos Luibusdam</h4>
                        <p class="ingredients">
                            Lorem, deren, trataro, filede, nerada
                        </p>
                        <p class="price">
                            $12.95
                        </p>
                    </div><!-- Menu Item -->

                    <div class="col-lg-4 menu-item">
                        <a href="assets/img/menu/menu-item-6.png" class="glightbox"><img
                                src="{{ asset('Yummy') }}/assets/img/menu/menu-item-6.png"
                                class="menu-img img-fluid" alt=""></a>
                        <h4>Laboriosam Direva</h4>
                        <p class="ingredients">
                            Lorem, deren, trataro, filede, nerada
                        </p>
                        <p class="price">
                            $9.95
                        </p>
                    </div><!-- Menu Item -->

                </div>
            </div><!-- End Breakfast Menu Content -->

            <!-- End Lunch Menu Content -->

            <!-- End Dinner Menu Content -->

        </div>

    </div>

</section>
@endsection