@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8 d-flex justify-content-center align-items-start" style="margin-top: 80px;">
                <div class="card shadow w-100">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0 text-center">Input Bangunan</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('bangunan.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_bangunan" class="form-label">Nama Bangunan</label>
                                <input type="text" name="nama_bangunan" class="form-control" id="nama_bangunan"
                                    value="{{ old('nama_bangunan') }}">
                                <input type="hidden" name="id" id="id">
                            </div>

                            <div class="mb-3">
                                <label for="kode_bangunan" class="form-label">Kode Bangunan</label>
                                <input type="text" name="kode_bangunan" class="form-control" id="kode_bangunan"
                                    value="{{ old('kode_bangunan') }}">
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
                                <button class="btn btn-success me-2" type="submit">Simpan</button>
                                <button class="btn btn-secondary" type="reset">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
