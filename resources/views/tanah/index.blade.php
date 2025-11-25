@extends('layouts.app')
@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0">Daftar Tanah</h3>
            @auth   
            <a class="btn btn-info text-white" href="{{ route('tanah.create') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-plus-square me-1" viewBox="0 0 16 16">
                <path
                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                <path
                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
            </svg>
            Tambah Data
        </a>
        @endauth
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col" class="text-center">Nama Tanah</th>
                            <th scope="col" class="text-center">Kode Tanah</th>
                            <th scope="col" class="text-center">Luas</th>
                            <th scope="col" class="text-center">No Sertifikat</th>
                            <th scope="col" class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td scope="col" class="text-center">{{ $loop->iteration }}</td>
                                <td scope="col" class="text-center">{{ $item->nama_tanah }}</td>
                                <td scope="col" class="text-center">{{ $item->kode_tanah }}</td>
                                <td scope="col" class="text-center">{{ $item->luas }}</td>
                                <td scope="col" class="text-center">{{ $item->no_sertifikat }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a class="btn btn-success btn-sm" href="{{ route('tanah.edit', $item->id) }}">Edit</a>
                                        <form action="{{ route('tanah.destroy', $item->id) }}" method="post"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
