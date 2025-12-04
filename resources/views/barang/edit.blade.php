@extends('layouts.app')
@section('content')

<style>
/* ================== UIverse Elegan Dark ================== */
body {
    background: #1a1a1a !important;
    color: #e0e0e0 !important;
    margin: 0;
    height: 100vh;
}

.center-container {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

/* Card */
.card {
    width: 100%;
    max-width: 600px;
    border-radius: 18px;
    background: #2a2a2a;
    box-shadow: 5px 5px 15px rgba(0,0,0,0.5), -5px -5px 15px rgba(255,255,255,0.05);
    padding: 25px 20px;
}

/* Card header */
.card-header {
    text-align: center;
    font-size: 22px;
    font-weight: 600;
    margin-bottom: 15px;
    background: #333333 !important;
    color: #e0e0e0 !important;
    border-radius: 18px 18px 0 0;
}

/* Form fields */
.form-label {
    color: #e0e0e0;
}

.form-control {
    background-color: #3a3a3a;
    border: 1px solid #555;
    color: #e0e0e0;
    border-radius: 10px;
    padding: 10px 12px;
    transition: 0.2s;
}

.form-control:focus {
    border-color: #888;
    box-shadow: 0 0 8px rgba(136,136,136,0.5);
    outline: none;
}

/* Buttons */
.btn {
    border-radius: 12px;
    border: none;
    padding: 8px 16px;
    font-weight: 500;
    box-shadow: 3px 3px 10px rgba(0,0,0,0.4), -3px -3px 10px rgba(255,255,255,0.05);
    transition: 0.2s;
    color: #e0e0e0;
}

.btn-submit {
    background-color: #555555;
}

.btn-submit:hover {
    background-color: #666666;
    transform: translateY(-2px);
}

.btn-cancel {
    background-color: #444444;
}

.btn-cancel:hover {
    background-color: #555555;
    transform: translateY(-2px);
}
</style>

<div class="center-container">
    <div class="card">
        <div class="card-header">
            Edit Barang
        </div>
        <form action="{{ route('barang.update', $item->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang" id="nama_barang"
                    value="{{ old('nama_barang', $item->nama_barang) }}" required>
            </div>

            <div class="mb-3">
                <label for="kode_inventaris" class="form-label">Kode Inventaris</label>
                <input type="text" class="form-control" name="kode_inventaris" id="kode_inventaris"
                    value="{{ old('kode_inventaris', $item->kode_inventaris) }}" required>
            </div>

            <div class="mb-3">
                    <label for="kategori_id" class="form-label">Kategori</label>
                    <select name="kategori_id" id="kategori_id" class="form-select" required>
                        <option value="">-- Pilih kategori --</option>
                        @foreach ($kategori as $r)
                            <option value="{{ $r->id }}"
                                {{ old('kategori_id', $item->kategori_id) == $r->id ? 'selected' : '' }}>
                                {{ $r->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

            <div class="mb-3">
                    <label for="ruangan_id" class="form-label">Ruangan</label>
                    <select name="ruangan_id" id="ruangan_id" class="form-select" required>
                        <option value="">-- Pilih ruangan --</option>
                        @foreach ($ruangan as $r)
                            <option value="{{ $r->id }}"
                                {{ old('ruangan_id', $item->ruangan_id) == $r->id ? 'selected' : '' }}>
                                {{ $r->nama_ruangan }}
                            </option>
                        @endforeach
                    </select>
                </div>

            <div class="mb-3">
                <label for="tahun_pengadaan" class="form-label">Tahun Pengadaan</label>
                <input type="text" class="form-control" name="tahun_pengadaan" id="tahun_pengadaan"
                    value="{{ old('tahun_pengadaan', $item->tahun_pengadaan) }}" required>
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="text" class="form-control" name="jumlah" id="jumlah"
                    value="{{ old('jumlah', $item->jumlah) }}" required>
            </div>

            <div class="mb-3">
                <label for="kondisi" class="form-label">Kondisi</label>
                <input type="text" class="form-control" name="kondisi" id="kondisi"
                    value="{{ old('kondisi', $item->kondisi) }}" required>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <button type="submit" class="btn btn-submit">SIMPAN</button>
                <a href="{{ route('barang.index') }}" class="btn btn-cancel">BATAL</a>
            </div>

        </form>
    </div>
</div>

@endsection
