@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card" style="max-width: 500px; width: 100%;">
            <div class="card-header text-center">
                <strong>Input Kategori</strong>
            </div>
            <div class="card-body">
                <form action="{{ route('kategori.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_kategori" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" name="nama_kategori" id="nama_kategori"
                            value="{{ old('nama_kategori') }}" required>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">SIMPAN</button>
                        <button type="button" class="btn btn-danger"
                            onclick="window.location='{{ route('kategori.index') }}'">
                            BATAL
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
