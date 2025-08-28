@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow" style="width: 450px;">
        <div class="card-header text-center bg-primary text-white">
            <h4>Input User</h4>
        </div>
        <div class="card-body">
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
                    <button type="submit" class="btn btn-success me-2">SIMPAN</button>
                    <button type="reset" class="btn btn-secondary">BATAL</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
