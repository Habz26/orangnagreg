<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">

        <a class="navbar-brand"
            href="{{ auth()->check()
                ? (auth()->user()->role == 1
                    ? route('dashboard')
                    : route('dashboarduser'))
                : route('dashboarduser') }}">
            <i class="fas fa-boxes"></i> SIMASET
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ms-auto">

                {{-- Menu Items --}}
                @php
                    $menus = [
                        ['route'=>'tanah.index','icon'=>'fa-map','label'=>'Tanah'],
                        ['route'=>'bangunan.index','icon'=>'fa-building','label'=>'Bangunan'],
                        ['route'=>'ruangan.index','icon'=>'fa-door-open','label'=>'Ruangan'],
                        ['route'=>'barang.index','icon'=>'fa-cubes','label'=>'Barang'],
                        ['route'=>'kategori.index','icon'=>'fa-tags','label'=>'Kategori'],
                    ];
                @endphp

                @foreach($menus as $menu)
                    <li class="nav-item me-2">
                        <a class="nav-link uiverse-btn {{ request()->routeIs($menu['route']) ? 'active' : '' }}"
                            href="{{ route($menu['route']) }}">
                            <i class="fas {{ $menu['icon'] }}"></i> {{ $menu['label'] }}
                        </a>
                    </li>
                @endforeach

                @auth
                    <li class="nav-item me-2">
                        <a class="nav-link uiverse-btn {{ request()->routeIs('user.index') ? 'active' : '' }}"
                            href="{{ route('user.index') }}">
                            <i class="fas fa-user"></i> User
                        </a>
                    </li>

                    <li class="nav-item me-2">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <div class="del">
                                <div>
                                    <button type="submit" class="btn-logout">Logout</button>
                                </div>
                            </div>
                        </form>
                    </li>
                @endauth

                @guest
                    <li class="nav-item me-2">
                        <a class="btn btn-primary uiverse-btn" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                    </li>
                @endguest

            </ul>

        </div>
    </div>
</nav>

<style>
    /* ============================
   NAVBAR UIVERSE DARK PREMIUM
   ============================ */
.navbar {
    background: linear-gradient(145deg, #1c1c1c, #242424) !important;
    padding-top: 14px !important;
    padding-bottom: 14px !important;
    box-shadow: 0 6px 20px rgba(0,0,0,0.35);
    border-bottom: 1px solid rgba(255,255,255,0.04);
}

/* Brand lebih besar */
.navbar-brand {
    font-size: 1.45rem;
    font-weight: 700;
    letter-spacing: 1px;
    color: #ffffff !important;
    display: flex;
    align-items: center;
    gap: 8px;
    text-shadow: 0 2px 8px rgba(0,0,0,0.4);
}

.navbar-brand i {
    font-size: 1.5rem;
}

/* NAV ITEMS - UIverse Buttons */
.uiverse-btn {
    background: #1e1e1e;
    color: #fff !important;
    padding: 10px 18px;               /* lebih besar */
    font-size: 0.95rem;
    border-radius: 14px;
    box-shadow:
        4px 4px 10px rgba(0,0,0,0.35),
        -4px -4px 10px rgba(255,255,255,0.06);
    transition: all 0.25s ease-in-out;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.uiverse-btn i {
    font-size: 1rem;
}

.uiverse-btn:hover,
.uiverse-btn.active {
    transform: translateY(-3px);
    color: #00eaff !important;
    box-shadow:
        5px 5px 14px rgba(0,0,0,0.45),
        -5px -5px 14px rgba(255,255,255,0.08);
    background: #232323;
}

/* Logout Button - harmonisasi */
.del div {
    width: 110px;
    height: 42px;
    border-radius: 18px;
    font-size: 14px;
}

/* Nav item spacing */
.nav-item {
    display: flex;
    align-items: center;
}

.nav-item.me-2 {
    margin-right: 14px !important;
}

/* Mobile toggle lebih besar */
.navbar-toggler {
    padding: 8px 12px;
    border-radius: 10px;
}

.navbar-toggler-icon {
    width: 26px;
    height: 26px;
}


</style>
