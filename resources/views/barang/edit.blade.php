@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card" style="max-width: 600px; width: 100%;">
            <div class="card-header text-center">
                Edit Barang
            </div>
            <div class="card-body">
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
                        <label for="kategori_id" class="form-label">Kategori ID</label>
                        <input type="text" class="form-control" name="kategori_id" id="kategori_id"
                            value="{{ old('kategori_id', $item->kategori_id) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="ruangan_id" class="form-label">Ruangan ID</label>
                        <input type="text" class="form-control" name="ruangan_id" id="ruangan_id"
                            value="{{ old('ruangan_id', $item->ruangan_id) }}" required>
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

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">SIMPAN</button>
                        <a href="{{ route('barang.index') }}" class="btn btn-danger">BATAL</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
