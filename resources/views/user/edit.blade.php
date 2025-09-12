@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card" style="max-width: 500px; width: 100%;">
            <div class="card-header text-center">
                Edit User
            </div>
            <div class="card-body">
                <form action="{{ route('user.update', $item->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama"
                            value="{{ old('nama', $item->nama) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" name="email" id="email"
                            value="{{ old('email', $item->email) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <input type="text" class="form-control" name="role" id="role"
                            value="{{ old('role', $item->role) }}" required>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">SIMPAN</button>
                        <a href="{{ route('user.index') }}" class="btn btn-danger">BATAL</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
