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
                            <h3>{{ number_format($totalTanah, 0, ',', '.') }}<span style="font-size:0.7em;">m²</span></h3>
                            <p>Luas Tanah</p>
                        </div>
                        <div class="icon"><i class="fas fa-tree"></i></div>
                        <a href="{{ route('tanah.index') }}" class="small-box-footer">
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
            </div>
        </div>

        {{-- Hasil Pencarian --}}
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header bg-info text-white">
                        <strong>Hasil Pencarian</strong>
                        @if (request('q'))
                            : "{{ request('q') }}"
                        @endif
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
            </div>
        </div>



        {{-- Card Data Terkini --}}
        <div class="card mt-4 shadow-lg">
            <div class="card-header">
                <strong>Data Terkini</strong>
            </div>
            <div class="card-body p-0">
                <div id="scrollContainer" class="table-responsive scroll-hidden"
                    style="max-height: 400px; overflow-y: auto;">

                    {{-- Barangs --}}
                    <h6 class="px-3 pt-2">Barang</h6>
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th style="width: 60px">ID</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangs as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nama_barang }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                    {{-- Ruangan --}}
                    <h6 class="px-3 pt-2">Ruangan</h6>
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th style="width: 60px;">ID</th>
                                <th>Nama Ruangan</th>
                                <th>Kode</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ruangan as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nama_ruangan }}</td>
                                    <td>{{ $item->kode_ruangan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- Bangunan --}}
                    <h6 class="px-3 pt-2">Bangunan</h6>
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th style="width: 60px;">ID</th>
                                <th>Nama Bangunan</th>
                                <th>Kode</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bangunan as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nama_bangunan }}</td>
                                    <td>{{ $item->kode_bangunan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- Tanah --}}
                    <h6 class="px-3 pt-2">Tanah</h6>
                    <table class="table table-bordered table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th style="width: 60px;">ID</th>
                                <th>Nama Tanah</th>
                                <th>Luas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tanah as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nama_tanah }}</td>
                                    <td>{{ $item->luas }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>


    </div>
@endsection
