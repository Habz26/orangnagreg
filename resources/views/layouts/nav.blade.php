<nav class="navbar navbar-dark bg-secondary sticky-top py-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('dashboard') }}"><b>Sistem Informasi Manajemen Aset Sekolah</b></a>

        {{-- Hamburger menu hanya tampil kalau bukan halaman login --}}
        @if (!request()->routeIs('login'))
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
        @endif

        {{-- Offcanvas menu --}}
        <div class="offcanvas offcanvas-end bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><i>S I M A S E T</i></h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    @auth
                        @if (auth()->user()->role === 'admin')
                            <li>
                                <a class="nav-link" href="{{ route('user.index') }}">Data User</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">Beranda</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Lihat Data
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('bangunan.index') }}">Bangunan</a></li>
                                <li><a class="dropdown-item" href="{{ route('barang.index') }}">Barang</a></li>
                                <li><a class="dropdown-item" href="{{ route('kategori.index') }}">Kategori</a></li>
                                <li><a class="dropdown-item" href="{{ route('ruangan.index') }}">Ruangan</a></li>
                                <li><a class="dropdown-item" href="{{ route('tanah.index') }}">Tanah</a></li>
                            </ul>
                        </li>
                    @endauth
                </ul>

                <form class="d-flex mt-3" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>

            @auth
                <div class="mb-3" style="border-radius: 8px; padding: 10px;">
                    <form action="{{ route('logout') }}" method="post" class="d-grid gap-2">
                        @csrf
                        <button class="btn btn-danger" type="submit">Logout</button>
                    </form>
                </div>
            @endauth
        </div>
    </div>
</nav>
