@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card" style="max-width: 500px; width: 100%;">
        <div class="card-header text-center">
            Edit Tanah
        </div>
        <div class="card-body">
            <form action="{{ route('tanah.update', $item->id) }}" method="post">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="nama_tanah" class="form-label">Nama Tanah</label>
                    <input type="text" class="form-control" name="nama_tanah" id="nama_tanah" value="{{ old('nama_tanah', $item->nama_tanah) }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="kode_tanah" class="form-label">Kode Tanah</label>
                    <input type="text" class="form-control" name="kode_tanah" id="kode_tanah" value="{{ old('kode_tanah', $item->kode_tanah) }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="luas" class="form-label">Luas</label>
                    <input type="text" class="form-control" name="luas" id="luas" value="{{ old('luas', $item->luas) }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="no_sertifikat" class="form-label">No Sertifikat</label>
                    <input type="text" class="form-control" name="no_sertifikat" id="no_sertifikat" value="{{ old('no_sertifikat', $item->no_sertifikat) }}">
                </div>
                
                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                    <a href="{{ route('tanah.index') }}" class="btn btn-secondary">BATAL</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
