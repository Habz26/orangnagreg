@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card" style="max-width: 500px; width: 100%;">
        <div class="card-header text-center">
            Edit Ruangan
        </div>
        <div class="card-body">
            <form action="{{ route('ruangan.update', $item->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama_ruangan" class="form-label">Nama Ruangan</label>
                    <input type="text" class="form-control" name="nama_ruangan" id="nama_ruangan" 
                           value="{{ old('nama_ruangan', $item->nama_ruangan) }}" required>
                </div>

                <div class="mb-3">
                    <label for="kode_ruangan" class="form-label">Kode Ruangan</label>
                    <input type="text" class="form-control" name="kode_ruangan" id="kode_ruangan" 
                           value="{{ old('kode_ruangan', $item->kode_ruangan) }}" required>
                </div>

                <div class="mb-3">
                    <label for="bangunan_id" class="form-label">Bangunan ID</label>
                    <input type="text" class="form-control" name="bangunan_id" id="bangunan_id" 
                           value="{{ old('bangunan_id', $item->bangunan_id) }}" required>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">SIMPAN</button>
                    <a href="{{ route('ruangan.index') }}" class="btn btn-danger">BATAL</a>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
