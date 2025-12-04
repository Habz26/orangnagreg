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

/* Center container full */
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
    max-width: 450px;
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
            <h4>Input User</h4>
        </div>
        <form action="{{ route('user.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}">
            </div>

            <input type="hidden" name="id" id="id">

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}">
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-submit me-2">SIMPAN</button>
                <button type="reset" class="btn btn-cancel">BATAL</button>
            </div>
        </form>
    </div>
</div>

@endsection
