@extends('layouts.app')
@section('content')
<div class="container mt-5 d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="row justify-content-center w-100">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h4>Input Ruangan</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('ruangan.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_ruangan" class="form-label">Nama Ruangan</label>
                            <input type="text" class="form-control" name="nama_ruangan" id="nama_ruangan" value="{{ old('nama_ruangan') }}">
                        </div>
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label for="kode_ruangan" class="form-label">Kode Ruangan</label>
                            <input type="text" class="form-control" name="kode_ruangan" id="kode_ruangan" value="{{ old('kode_ruangan') }}">
                        </div>
                        <div class="mb-3">
                                <label for="bangunan_id" class="form-label">Bangunan ID</label>
                                <select name="bangunan_id" id="bangunan_id" class="form-select" required>
                                    <option value="">-- Pilih Bangunan --</option>
                                    @foreach ($bangunan as $r)
                                        <option value="{{ $r->id }}">{{ $r->nama_bangunan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-success">SIMPAN</button>
                            <button type="reset" class="btn btn-secondary">BATAL</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection