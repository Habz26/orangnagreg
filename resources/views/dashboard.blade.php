@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <h1 class="m-4">Beranda</h1>
        <div class="row">
            <div class="row flex-nowrap overflow-auto scroll-hidden">
                {{-- Data Meja Siswa --}}
                <div class="col-lg-3 col-md-4 col-sm-6">
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
                <div class="col-lg-3 col-md-4 col-sm-6">
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
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ number_format($totalTanah, 0, ',', '.') }}<span style="font-size:0.7em;"></span></h3>
                            <p>Total Tanah</p>
                        </div>
                        <div class="icon"><i class="fas fa-tree"></i></div>
                        <a href="{{ route('tanah.index') }}" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>


                {{-- Total Bangunan --}}
                <div class="col-lg-3 col-md-4 col-sm-6">
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
                <div class="col-lg-3 col-md-4 col-sm-6">
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
        </div>

        {{-- Hasil Pencarian --}}
        <div class="row mt-2">
            <div class="col-12">
                <div class="card shadow-lg">
                    {{-- Card Header --}}
                    <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                        <div>
                            <strong>Hasil Pencarian</strong>
                            @if (request('q'))
                                : "{{ request('q') }}"
                            @endif
                        </div>

                        {{-- Form Pencarian di kanan --}}
                        <form action="{{ route('dashboard') }}" method="GET" class="d-flex"
                            style="gap: 5px; max-width: 300px; width: 100%;">
                            <input type="text" name="q" class="form-control form-control-sm"
                                placeholder="Cari data..." value="{{ request('q') }}"
                                style="border-radius: 4px 0 0 4px; border-right: none;">
                            <button class="btn btn-light btn-sm" type="submit"
                                style="border-radius: 0 4px 4px 0; border-left: none;">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>

                    {{-- Card Body (tetap sama) --}}
                    <div class="card-body p-2">
                        @if (request('q'))
                            @if ($searchBarangs->isEmpty() && $searchRuangan->isEmpty() && $searchBangunan->isEmpty() && $searchTanah->isEmpty())
                                <p>Tidak ada data ditemukan.</p>
                            @else
                                @if (!$searchBarangs->isEmpty())
                                    <h6>Barang</h6>
                                    <ul>
                                        @foreach ($searchBarangs as $item)
                                            <li>{{ $item->nama_barang }} | {{ $item->kode_inventaris }} |
                                                {{ $item->jumlah }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                @if (!$searchRuangan->isEmpty())
                                    <h6>Ruangan</h6>
                                    <ul>
                                        @foreach ($searchRuangan as $item)
                                            <li>{{ $item->nama_ruangan }} | Kode Ruangan : {{ $item->kode_ruangan }} |
                                                Bangunan : {{ $item->bangunan_id }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                @if (!$searchBangunan->isEmpty())
                                    <h6>Bangunan</h6>
                                    <ul>
                                        @foreach ($searchBangunan as $item)
                                            <li>{{ $item->nama_bangunan }} | Kode Bangunan : {{ $item->kode_bangunan }} |
                                                Tanah : {{ $item->tanah_id }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                @if (!$searchTanah->isEmpty())
                                    <h6>Tanah</h6>
                                    <ul>
                                        @foreach ($searchTanah as $item)
                                            <li>{{ $item->nama_tanah }} | Luas tanah :{{ $item->luas }} | No Sertifikat
                                                : {{ $item->no_sertifikat }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            @endif
                        @else
                            <p>Masukkan kata kunci untuk mencari data.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Rekap Data --}}
        <hr class="bg-dark">
        <div class="ms-auto mt-2">
            <button class="btn btn-success" onclick="printRekap()">Cetak Rekap</button>
        </div>
        <div id="rekapCard" class="card mt-2 shadow-lg">
            <div class="card-header bg-primary text-white d-flex align-items-center">
                <strong>Rekap Data</strong>
            </div>
            <div class="card-body p-3 scroll-hidden" style="max-height: 500px; overflow-y: auto;">
                @foreach ($tanahList as $tanah)
                    <div class="mb-3 p-2 border rounded" style="background-color: #f8f9fa;">
                        <h5 class="mb-2">Tanah: {{ $tanah->nama_tanah }} | Luas: {{ $tanah->luas }}</h5>
                        @foreach ($tanah->bangunan as $bangunan)
                            <div class="mb-2 p-2 border rounded" style="background-color: #e9ecef; margin-left: 20px;">
                                <h6 class="mb-1">Bangunan: {{ $bangunan->nama_bangunan }} | Kode:
                                    {{ $bangunan->kode_bangunan }}</h6>
                                @foreach ($bangunan->ruangan as $ruangan)
                                    <div class="mb-1 p-2 border rounded"
                                        style="background-color: #dee2e6; margin-left: 20px;">
                                        <h6 class="mb-1">Ruangan: {{ $ruangan->nama_ruangan }} | Kode:
                                            {{ $ruangan->kode_ruangan }}</h6>
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
@endsection
