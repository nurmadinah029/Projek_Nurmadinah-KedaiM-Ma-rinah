<nav id="navmenu" class="navmenu">
    <ul>
        <li><a href="{{route('halaman')}}" class="active">Home</a></li>
        <li><a href="{{route('about')}}" >About me</a></li>
        <li><a href="{{route('menu')}}">Menu</a></li>
        <li class="dropdown"><a href="#"><span>Kategori</span> <i
                    class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
                <li><a href="#">Makanan</a></li>
                <li><a href="#">Minuman</a></li>
            </ul>
        </li>
        <li><a href="{{route('contact')}}">Contact</a></li>
        <li>
            <a href="{{ route('pesanan') }}">
                <i class="bi bi-cart3"></i> Pesanan Saya
            </a>
        </li>
        <li>
            <a href="{{ route('riwayat.pesanan') }}">
                <i class="bi bi-clock-history"></i> riwayat pesanan
            </a>
        </li>
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>