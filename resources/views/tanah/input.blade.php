@extends('layouts.app')
@section('content')
<div class="container mt-5 d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="row justify-content-center w-100">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Input Data Tanah</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('tanah.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_tanah" class="form-label">Nama Tanah</label>
                            <input type="text" class="form-control" name="nama_tanah" id="nama_tanah" value="{{ old('nama_tanah') }}">
                        </div>
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label for="kode_tanah" class="form-label">Kode Tanah</label>
                            <input type="text" class="form-control" name="kode_tanah" id="kode_tanah" value="{{ old('kode_tanah') }}">
                        </div>
                        <div class="mb-3">
                            <label for="luas" class="form-label">Luas</label>
                            <input type="text" class="form-control" name="luas" id="luas" value="{{ old('luas') }}">
                        </div>
                        <div class="mb-3">
                            <label for="no_sertifikat" class="form-label">No Sertifikat</label>
                            <input type="text" class="form-control" name="no_sertifikat" id="no_sertifikat" value="{{ old('no_sertifikat') }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success me-2">SIMPAN</button>
                            <button type="reset" class="btn btn-secondary">BATAL</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection