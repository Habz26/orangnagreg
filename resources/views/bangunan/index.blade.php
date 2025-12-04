@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    {{-- Header + Button Tambah --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0 text-white">Daftar Bangunan</h3>
        @auth
        <a class="btn btn-info text-black" href="{{ route('bangunan.create') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-plus-square me-1" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
            </svg>
            Tambah Data
        </a>
        @endauth
    </div>

    {{-- Card Table --}}
    <div class="card shadow-lg">
        <div class="card-body p-3">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 text-white">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col">Nama Bangunan</th>
                            <th scope="col">Kode Bangunan</th>
                            <th scope="col">Tanah</th>
                            @auth
                            <th scope="col" class="text-center">Opsi</th>
                            @endauth
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration + ($items->currentPage()-1)*$items->perPage() }}</td>
                            <td>{{ $item->nama_bangunan }}</td>
                            <td>{{ $item->kode_bangunan }}</td>
                            <td>{{ $item->tanah->nama_tanah ?? '-' }}</td>
                            @auth
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a class="btn btn-success btn-sm" href="{{ route('bangunan.edit', $item->id) }}">Edit</a>
                                    <form action="{{ route('bangunan.destroy', $item->id) }}" method="post" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                    </form>
                                </div>
                            </td>
                            @endauth
                        </tr>
                        @endforeach
                        @if ($items->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center fst-italic text-white">Belum ada data bangunan.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="mt-3 d-flex justify-content-end">
                {{ $items->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

</div>
@endsection

@push('head')
<style>
body { background: #1e1e1e !important; color: #f0f0f0 !important; }

/* Card */
.card { background: #252525 !important; border-radius: 18px; border: none;
    box-shadow: 6px 6px 16px rgba(0,0,0,0.5), -6px -6px 16px rgba(255,255,255,0.06); }
.card-body { padding: 1.5rem !important; }

/* Table */
.table { color: #f0f0f0; }
.table-hover tbody tr:hover { background-color: #2e2e2e; }
.table-dark { background-color: #303030 !important; }
.table-dark th { border-color: #444; }

/* Buttons */
.btn-info { background-color: #00eaff; border-color: #00eaff; color: #000; transition: 0.3s; }
.btn-info:hover { background-color: #00c2cc; color: #fff; }
.btn-success { background-color: #28a745; border-color: #28a745; color: #fff; transition: 0.3s; }
.btn-success:hover { background-color: #218838; }
.btn-danger { background-color: #dc3545; border-color: #dc3545; color: #fff; transition: 0.3s; }
.btn-danger:hover { background-color: #c82333; }

.table-responsive { overflow-x: auto; border-radius: 12px; }
</style>
@endpush
