@extends('layouts.app')
@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0">Daftar Barang</h3>
            <a class="btn btn-info text-white" href="{{ route('barang.create') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-plus-square me-1" viewBox="0 0 16 16">
                    <path
                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                </svg>
                Tambah Data
            </a>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col" class="text-center">Nama Barang</th>
                            <th scope="col" class="text-center">Kode Inventaris</th>
                            <th scope="col" class="text-center">Kategori ID</th>
                            <th scope="col" class="text-center">Ruangan ID</th>
                            <th scope="col" class="text-center">Tahun Pengadaan</th>
                            <th scope="col" class="text-center">Sumber Dana</th>
                            <th scope="col" class="text-center">Jumlah</th>
                            <th scope="col" class="text-center">Kondisi</th>
                            <th scope="col" class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{ $item->kode_inventaris }}</td>
                                <td>{{ $item->kategori_id }}</td>
                                <td>{{ $item->ruangan_id }}</td>
                                <td>{{ $item->tahun_pengadaan }}</td>
                                <td>{{ $item->sumber_dana }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->kondisi }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a class="btn btn-success btn-sm"
                                            href="{{ route('barang.edit', $item->id) }}">Edit</a>
                                        <form action="{{ route('barang.destroy', $item->id) }}" method="post"
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
