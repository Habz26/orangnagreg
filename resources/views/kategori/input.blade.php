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

/* Container center full */
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
    max-width: 400px;
    border-radius: 18px;
    background: #2a2a2a;
    box-shadow: 5px 5px 15px rgba(0,0,0,0.5), -5px -5px 15px rgba(255,255,255,0.05);
    padding: 25px 20px;
}

/* Card heading */
.card-header {
    text-align: center;
    font-size: 22px;
    font-weight: 600;
    margin-bottom: 15px;
    color: #e0e0e0;
}

/* Form fields */
.field {
    position: relative;
    display: flex;
    align-items: center;
    margin-bottom: 15px;
}

.input-field {
    width: 100%;
    padding: 12px 15px 12px 40px;
    background: #3a3a3a;
    border: 1px solid #555;
    border-radius: 10px;
    color: #e0e0e0;
    transition: 0.2s;
}

.input-field:focus {
    border-color: #888;
    box-shadow: 0 0 8px rgba(136,136,136,0.5);
    outline: none;
}

.input-icon {
    position: absolute;
    left: 12px;
    color: #bbb;
}

/* Buttons */
.btn {
    display: flex;
    gap: 10px;
    margin-top: 10px;
}

.btn-submit, .btn-cancel {
    flex: 1;
    padding: 10px 20px;
    border: none;
    border-radius: 12px;
    cursor: pointer;
    color: #e0e0e0;
    transition: 0.2s;
    box-shadow: 2px 2px 10px rgba(0,0,0,0.3), -2px -2px 10px rgba(255,255,255,0.05);
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

/* Error message */
.error-msg {
    color: #ff5858;
    font-size: 0.9rem;
    margin-top: -10px;
}
</style>

<div class="center-container">
    <div class="card">
        <p class="card-header">Input Kategori</p>
        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf
            <div class="field">
                <svg viewBox="0 0 16 16" fill="currentColor" height="18" width="18"
                    xmlns="http://www.w3.org/2000/svg" class="input-icon">
                    <path d="M3 2a1 1 0 0 0-1 1v1h12V3a1 1 0 0 0-1-1H3zm11 4H2v7a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V6z" />
                </svg>
                <input type="text" class="input-field" name="nama_kategori" placeholder="Nama kategori..." value="{{ old('nama_kategori') }}" required>
            </div>

            @error('nama_kategori')
                <div class="error-msg">{{ $message }}</div>
            @enderror

            <div class="btn">
                <button type="submit" class="btn-submit">Simpan</button>
                <button type="button" class="btn-cancel" onclick="window.location='{{ route('kategori.index') }}'">Batal</button>
            </div>
        </form>
    </div>
</div>

@endsection
