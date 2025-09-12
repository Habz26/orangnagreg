@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card" style="max-width: 500px; width: 100%;">
            <div class="card-header text-center">
                Edit Bangunan
            </div>
            <div class="card-body">
                <form action="{{ route('bangunan.update', $item->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama_bangunan" class="form-label">Nama Bangunan</label>
                        <input type="text" class="form-control" name="nama_bangunan" id="nama_bangunan"
                            value="{{ old('nama_bangunan', $item->nama_bangunan) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="kode_bangunan" class="form-label">Kode Bangunan</label>
                        <input type="text" class="form-control" name="kode_bangunan" id="kode_bangunan"
                            value="{{ old('kode_bangunan', $item->kode_bangunan) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="tanah_id" class="form-label">Tanah ID</label>
                        <input type="text" class="form-control" name="tanah_id" id="tanah_id"
                            value="{{ old('tanah_id', $item->tanah_id) }}" required>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">SIMPAN</button>
                        <a href="{{ route('bangunan.index') }}" class="btn btn-danger">BATAL</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
