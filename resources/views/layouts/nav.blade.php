<nav class="navbar navbar-expand-lg navbar-dark ">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Sistem Informasi Manajemen Aset Sekolah</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            @auth
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="../dashboard">Dashboard</a>
                    @if (auth()->user()->role === 'admin')
                        <a class="nav-link" href="{{ route('user.index') }}">User</a>
                    @endif
                    <a class="nav-link" href="../barang">Barang</a>
                    <a class="nav-link" aria-current="page" href="../tanah">Tanah</a>
                    <a class="nav-link" href="../bangunan">Bangunan</a>
                    <a class="nav-link" href="../ruangan">Ruangan</a>
                    <a class="nav-link" href="../kategori">Kategori</a>
                </div>
                <div class="ms-auto">
                    <button class="btn btn-outline-info me-2" onclick="location.href='02index.php';">Lihat Data</button>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="btn btn-outline-danger me-2" type="submit">Logout</button>
                    </form>
                </div>
            @endauth
        </div>
    </div>
    </div>
</nav>
