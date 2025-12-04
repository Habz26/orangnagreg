@extends('layouts.app')

@section('content')

<style>
/* ================== UIverse Elegan Centered ================== */
body {
    background: #1e1e1e !important;
    color: #f0f0f0 !important;
}

/* Full height container */
.center-container {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Card */
.card {
    background: #252525 !important;
    border-radius: 18px;
    box-shadow: 6px 6px 16px rgba(0,0,0,0.5), -6px -6px 16px rgba(255,255,255,0.06);
    border: none;
    width: 100%;
    max-width: 500px; /* fixed max width */
}

/* Card header */
.card-header {
    background: #2b2b2b !important;
    border-radius: 18px 18px 0 0;
    text-align: center;
}

/* Form labels & inputs */
.form-label {
    color: #f0f0f0;
}

.form-control, .form-select {
    background-color: #2b2b2b;
    border: 1px solid #444;
    color: #f0f0f0;
    border-radius: 10px;
    transition: 0.2s;
}

.form-control:focus, .form-select:focus {
    background-color: #2b2b2b;
    color: #f0f0f0;
    border-color: #888;
    box-shadow: 0 0 8px rgba(136,136,136,0.5);
    outline: none;
}

/* Buttons */
.btn-primary {
    background-color: #444;
    border-color: #444;
    color: #f0f0f0;
    border-radius: 12px;
    padding: 8px 16px;
    box-shadow: 3px 3px 10px rgba(0,0,0,0.4), -3px -3px 10px rgba(255,255,255,0.05);
    transition: 0.2s;
}

.btn-primary:hover {
    background-color: #555;
    transform: translateY(-2px);
}

.btn-secondary {
    background-color: #333;
    border-color: #333;
    color: #f0f0f0;
    border-radius: 12px;
    padding: 8px 16px;
    box-shadow: 3px 3px 10px rgba(0,0,0,0.4), -3px -3px 10px rgba(255,255,255,0.05);
    transition: 0.2s;
}

.btn-secondary:hover {
    background-color: #444;
    transform: translateY(-2px);
}
</style>

<div class="center-container">
    <div class="card shadow">
        <div class="card-header">
            <h4 class="mb-0">Input Barang</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('barang.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" id="nama_barang">
                </div>

                <input type="hidden" name="id" id="id">

                <div class="mb-3">
                    <label for="kode_inventaris" class="form-label">Kode Inventaris</label>
                    <input type="text" name="kode_inventaris" class="form-control" id="kode_inventaris">
                </div>

                <div class="mb-3">
                    <label for="kategori_id" class="form-label">Kategori</label>
                    <select name="kategori_id" id="kategori_id" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($kategori as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="ruangan_id" class="form-label">Ruangan</label>
                    <select name="ruangan_id" id="ruangan_id" class="form-select" required>
                        <option value="">-- Pilih Ruangan --</option>
                        @foreach ($ruangan as $r)
                            <option value="{{ $r->id }}">{{ $r->nama_ruangan }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tahun_pengadaan" class="form-label">Tahun Pengadaan</label>
                    <input type="text" name="tahun_pengadaan" class="form-control" id="tahun_pengadaan">
                </div>

                <div class="mb-3">
                    <label for="sumber_dana" class="form-label">Sumber Dana</label>
                    <input type="text" name="sumber_dana" class="form-control" id="sumber_dana">
                </div>

                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="text" name="jumlah" class="form-control" id="jumlah">
                </div>

                <div class="mb-3">
                    <label for="kondisi" class="form-label">Kondisi</label>
                    <input type="text" name="kondisi" class="form-control" id="kondisi">
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary me-2" type="submit">Simpan</button>
                    <button type="button" class="btn btn-secondary" onclick="window.location='{{ route('barang.index') }}'">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
