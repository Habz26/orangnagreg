@extends('layouts.app')

@section('content')

<style>
/* ================== UIverse Elegan Dark Centered ================== */
body {
    background: #1a1a1a !important;
    color: #e0e0e0 !important;
    margin: 0;
    height: 100vh;
}

/* Full-height centered container */
.center-container {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

/* Card */
.card {
    background: #2a2a2a !important;
    border-radius: 18px;
    box-shadow: 5px 5px 15px rgba(0,0,0,0.5), -5px -5px 15px rgba(255,255,255,0.05);
    border: none;
    width: 100%;
    max-width: 500px;
}

/* Card header */
.card-header {
    border-radius: 18px 18px 0 0;
    text-align: center;
    background: #333333 !important;
}

/* Form labels & inputs */
.form-label {
    color: #e0e0e0;
}

.form-control, .form-select {
    background-color: #3a3a3a;
    border: 1px solid #555;
    color: #e0e0e0;
    border-radius: 10px;
    transition: 0.2s;
}

.form-control:focus, .form-select:focus {
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
    <div class="card shadow">
        <div class="card-header">
            <h4 class="mb-0">Input Bangunan</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('bangunan.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="nama_bangunan" class="form-label">Nama Bangunan</label>
                    <input type="text" name="nama_bangunan" class="form-control" id="nama_bangunan" value="{{ old('nama_bangunan') }}">
                    <input type="hidden" name="id" id="id">
                </div>

                <div class="mb-3">
                    <label for="kode_bangunan" class="form-label">Kode Bangunan</label>
                    <input type="text" name="kode_bangunan" class="form-control" id="kode_bangunan" value="{{ old('kode_bangunan') }}">
                </div>

                <div class="mb-3">
                    <label for="tanah_id" class="form-label">Tanah</label>
                    <select name="tanah_id" id="tanah_id" class="form-select" required>
                        <option value="">-- Pilih Tanah --</option>
                        @foreach ($tanah as $r)
                            <option value="{{ $r->id }}">{{ $r->nama_tanah }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-submit me-2" type="submit">Simpan</button>
                    <button class="btn btn-cancel" type="reset">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
