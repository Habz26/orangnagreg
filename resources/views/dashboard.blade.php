@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

    {{-- CARD STATISTIK (5 Card, horizontal) --}}
    <div class="stats-wrapper mt-4">
        {{-- Total Inventaris --}}
        <div class="col-card">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ number_format($totalInventaris, 0, ',', '.') }}</h3>
                    <p>Total Inventaris</p>
                </div>
                <div class="icon"><i class="fas fa-user-plus"></i></div>
                <a href="{{ route('barang.index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        {{-- Total Ruangan --}}
        <div class="col-card">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ number_format($totalRuangan, 0, ',', '.') }}</h3>
                    <p>Total Ruangan</p>
                </div>
                <div class="icon"><i class="fas fa-door-open"></i></div>
                <a href="{{ route('ruangan.index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        {{-- Total Tanah --}}
        <div class="col-card">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ number_format($totalTanah, 0, ',', '.') }}</h3>
                    <p>Total Tanah</p>
                </div>
                <div class="icon"><i class="fas fa-tree"></i></div>
                <a href="{{ route('tanah.index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        {{-- Total Bangunan --}}
        <div class="col-card">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ number_format($totalBangunan, 0, ',', '.') }}</h3>
                    <p>Total Bangunan</p>
                </div>
                <div class="icon"><i class="fas fa-building"></i></div>
                <a href="{{ route('bangunan.index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        {{-- Total User --}}
        <div class="col-card">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ number_format($totalUser, 0, ',', '.') }}</h3>
                    <p>Total User</p>
                </div>
                <div class="icon"><i class="fas fa-users"></i></div>
                <a href="{{ route('user.index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    {{-- HASIL PENCARIAN --}}
    <div class="row mt-4 justify-content-center">
        <div class="col-12 col-xl-11">
            <div class="card shadow-lg">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <div>
                        <strong>Hasil Pencarian</strong>
                        @if (request('q')): "{{ request('q') }}" @endif
                    </div>
                    <form action="{{ route('dashboard') }}" method="GET" class="d-flex" style="gap:5px; max-width:300px; width:100%;">
                        <input type="text" name="q" class="form-control form-control-sm" placeholder="Cari data..." value="{{ request('q') }}" style="border-radius: 4px 0 0 4px; border-right:none;">
                        <button class="btn btn-light btn-sm" type="submit" style="border-radius:0 4px 4px 0; border-left:none;">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
                <div class="card-body p-2">
                    @if (request('q'))
                        @if ($searchBarangs->isEmpty() && $searchRuangan->isEmpty() && $searchBangunan->isEmpty() && $searchTanah->isEmpty())
                            <p>Tidak ada data ditemukan.</p>
                        @else
                            @if (!$searchBarangs->isEmpty())
                                <h6>Barang</h6>
                                <ul>
                                    @foreach ($searchBarangs as $item)
                                        <li>{{ $item->nama_barang }} | {{ $item->kode_inventaris }} | {{ $item->jumlah }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            @if (!$searchRuangan->isEmpty())
                                <h6>Ruangan</h6>
                                <ul>
                                    @foreach ($searchRuangan as $item)
                                        <li>{{ $item->nama_ruangan }} | Kode Ruangan : {{ $item->kode_ruangan }} | Bangunan : {{ $item->bangunan_id }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            @if (!$searchBangunan->isEmpty())
                                <h6>Bangunan</h6>
                                <ul>
                                    @foreach ($searchBangunan as $item)
                                        <li>{{ $item->nama_bangunan }} | Kode Bangunan : {{ $item->kode_bangunan }} | Tanah : {{ $item->tanah_id }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            @if (!$searchTanah->isEmpty())
                                <h6>Tanah</h6>
                                <ul>
                                    @foreach ($searchTanah as $item)
                                        <li>{{ $item->nama_tanah }} | Luas tanah :{{ $item->luas }} | No Sertifikat : {{ $item->no_sertifikat }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        @endif
                    @else
                        <p>Masukkan kata kunci untuk mencari data.</p>
                    @endif
                </div>
            </div>

            <hr class="bg-dark">
            <div class="ms-auto mt-2">
                <button class="btn btn-success" onclick="printRekap()">Cetak Rekap</button>
            </div>

            {{-- REKAP DATA --}}
            <div id="rekapCard" class="card mt-2 shadow-lg">
                <div class="card-header bg-primary text-white d-flex align-items-center">
                    <strong>Rekap Data</strong>
                </div>
                <div class="card-body p-3 scroll-hidden" style="max-height: 500px; overflow-y: auto;">
                    @foreach ($tanahList as $tanah)
                        <div class="mb-3 p-2 border rounded" style="background-color: #f8f9fa;">
                            <h5 class="mb-2">Tanah: {{ $tanah->nama_tanah }} | Luas: {{ $tanah->luas }}</h5>
                            @foreach ($tanah->bangunan as $bangunan)
                                <div class="mb-2 p-2 border rounded" style="background-color: #e9ecef; margin-left:20px;">
                                    <h6 class="mb-1">Bangunan: {{ $bangunan->nama_bangunan }} | Kode: {{ $bangunan->kode_bangunan }}</h6>
                                    @foreach ($bangunan->ruangan as $ruangan)
                                        <div class="mb-1 p-2 border rounded" style="background-color:#dee2e6; margin-left:20px;">
                                            <h6 class="mb-1">Ruangan: {{ $ruangan->nama_ruangan }} | Kode: {{ $ruangan->kode_ruangan }}</h6>
                                            @if ($ruangan->barangs->count())
                                                <ul class="mb-0 ps-3">
                                                    @foreach ($ruangan->barangs as $barang)
                                                        <li>{{ $barang->nama_barang }} | Jumlah: {{ $barang->jumlah }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <p class="mb-0 ps-3 fst-italic">Tidak ada inventaris.</p>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

</div>
@endsection

@push('head')
<style>
/* ================== GLOBAL UIverse THEME ================== */
body {
    background: #1e1e1e !important;
    color: #f0f0f0 !important;
}

/* ================== STAT CARD ================== */
.stats-wrapper {
    display: flex;
    flex-wrap: wrap; /* wrap biar responsive */
    gap: 15px;
    justify-content: center;
    margin-bottom: 30px;
}

.col-card {
    flex: 1 1 calc(20% - 12px); /* 5 card horizontal */
    min-width: 220px;
}

/* SMALL BOX UIverse */
.small-box {
    border-radius: 18px;
    padding: 18px;
    position: relative;
    background: #242424 !important;
    color: white !important;
    box-shadow: 6px 6px 12px rgba(0,0,0,0.5), -6px -6px 12px rgba(255,255,255,0.04);
    transition: 0.3s ease;
}

.small-box:hover {
    transform: translateY(-10px);
    box-shadow: 12px 12px 22px rgba(0,0,0,0.55), -12px -12px 22px rgba(255,255,255,0.04) !important;
}

.small-box .icon {
    top: 10px;
    right: 10px;
    font-size: 58px;
    opacity: 0.2;
}

.small-box .inner h3 {
    font-size: 2.2rem;
    font-weight: 700;
}

.small-box .small-box-footer {
    background: rgba(255,255,255,0.08);
    color: #00eaff;
    border-radius: 10px;
    display: inline-block;
    padding: 6px 12px;
    margin-top: 10px;
    text-decoration: none;
    font-weight: 500;
}

.small-box:hover .small-box-footer {
    background: rgba(0,234,255,0.2);
}

/* ================== MODERN CARD UIverse ================== */
.card {
    background: #252525 !important;
    border-radius: 18px;
    color: white;
    border: none;
    box-shadow: 6px 6px 16px rgba(0,0,0,0.5), -6px -6px 16px rgba(255,255,255,0.06);
}

.card-header {
    background: #303030 !important;
    border-bottom: 1px solid rgba(255,255,255,0.1) !important;
}

.card-header strong {
    font-size: 1.1rem;
    letter-spacing: 1px;
}

/* Search Input */
.card .form-control {
    background: #1e1e1e;
    color: #fff;
    border: 1px solid #333;
    border-radius: 10px;
}

.card .btn-light {
    background: #2a2a2a;
    color: white;
    border: 1px solid #333;
    transition: 0.2s;
}

.card .btn-light:hover {
    background: #00eaff;
    color: #000;
}

/* REKAP BOX */
#rekapCard .border {
    background: #2e2e2e !important;
    border-color: #3c3c3c !important;
    color: #fff;
}

#rekapCard h5, #rekapCard h6 {
    color: #00eaff;
}

#rekapCard ul li {
    color: #ddd;
}

/* Scroll smooth + hidden */
.scroll-hidden::-webkit-scrollbar {
    width: 0 !important;
}

/* Hover card tetap muncul */
.small-box:hover {
    z-index: 20;
}
</style>
@endpush
