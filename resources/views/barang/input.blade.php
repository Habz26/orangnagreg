@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8 d-flex justify-content-center align-items-start" style="margin-top: 80px;">
                <div class="card shadow w-100">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0 text-center">Input Barang</h4>
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
                                <label for="kondisi" class="form-label">Kondisi</label>
                                <input type="text" name="kondisi" class="form-control" id="kondisi">
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-success me-2" type="submit">Simpan</button>
                                <button class="btn btn-secondary" type="reset">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
