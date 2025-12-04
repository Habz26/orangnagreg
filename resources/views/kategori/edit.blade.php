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
    max-width: 500px;
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
            Edit Kategori
        </div>
        <form action="{{ route('kategori.update', $item->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" name="nama_kategori" id="nama_kategori"
                       value="{{ old('nama_kategori', $item->nama_kategori) }}" required>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <button type="submit" class="btn btn-submit">SIMPAN</button>
                <button type="button" class="btn btn-cancel"
                        onclick="window.location='{{ route('kategori.index') }}'">
                    BATAL
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
