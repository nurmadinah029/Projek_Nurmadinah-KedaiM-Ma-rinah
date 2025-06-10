<header id="header" class="header d-flex align-items-center sticky-top">

    <div class="container position-relative d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
            <h1 class="sitename">Kedai MA'RINA</h1>
            <span>.</span>
        </a>
        @include('halaman.navbar')
        <!-- proses pengecekan apakah sdh login atau belum -->
        @if (Auth::check() && Auth::user()->role === 'Pembeli')
            <div class="dropdown">
                <button class="btn btn-outline-dark dropdown-toggle d-flex align-items-center" type="button"
                    id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle me-2 fs-5"></i>
                    <span class="d-none d-sm-inline">{{ Auth::user()->name }}</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="#"><i
                                class="bi bi-person me-2 text-secondary"></i>Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="bi bi-box-arrow-right me-2"></i>Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        @else
            <div class="dropdown">
                <a class="btn-getstarted dropdown-toggle" href="#" id="loginDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Login
                </a>
                <ul class="dropdown-menu" aria-labelledby="loginDropdown">
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.login') }}">
                            <i class="fa fa-user-shield me-2"></i> Admin
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('kasir.login') }}">
                            <i class="fa fa-cash-register me-2"></i> Kasir
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('pembeli.login') }}">
                            <i class="fa fa-shopping-cart me-2"></i> Pembeli
                        </a>
                    </li>
                </ul>
            </div>
        @endif
    </div>

</header>