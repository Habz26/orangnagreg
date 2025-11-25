<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">

        <a class="navbar-brand"
   href="{{ 
        auth()->check() 
            ? (auth()->user()->role == 1 ? route('dashboard') : route('dashboarduser')) 
            : route('dashboarduser')
    }}">
    <i class="fas fa-boxes"></i> SIMASET
</a>



        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('tanah.index') ? 'active' : '' }}"
                           href="{{ route('tanah.index') }}">
                            <i class="fas fa-map"></i> Tanah
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('bangunan.index') ? 'active' : '' }}"
                           href="{{ route('bangunan.index') }}">
                            <i class="fas fa-building"></i> Bangunan
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('ruangan.index') ? 'active' : '' }}"
                           href="{{ route('ruangan.index') }}">
                            <i class="fas fa-door-open"></i> Ruangan
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('barang.index') ? 'active' : '' }}"
                           href="{{ route('barang.index') }}">
                            <i class="fas fa-cubes"></i> Barang
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('kategori.index') ? 'active' : '' }}"
                           href="{{ route('kategori.index') }}">
                            <i class="fas fa-tags"></i> Kategori
                        </a>
                    </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('user.index') ? 'active' : '' }}"
                            href="{{ route('user.index') }}">
                            <i class="fas fa-user"></i> User
                        </a>
                    </li>
                    {{-- User / Logout --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth


                {{-- Jika user belum login --}}
                @guest
                    <li class="nav-item">
                        <a class="btn btn-primary" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                    </li>
                @endguest

            </ul>

        </div>
    </div>
</nav>
