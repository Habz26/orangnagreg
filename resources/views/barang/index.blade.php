@extends('layouts.app')
@section('content')
    <div style="margin: 20px;">
        <a class="btn btn-outline-info m-2" href='{{route('barang.create')}}';">Tambah Data</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Kode Inventaris</th>
                    <th>Kategori ID</th>
                    <th>Ruangan ID</th>
                    <th>Tahun Pengadaan</th>
                    <th>Sumber Dana</th>
                    <th>Kondisi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_barang}}</td>
                    <td>{{ $item->kode_inventaris }}</td>
                    <td>{{ $item->kategori_id}}</td>
                    <td>{{ $item->ruangan_id}}</td>
                    <td>{{ $item->tahun_pengadaan}}</td>
                    <td>{{ $item->sumber_dana}}</td>
                    <td>{{ $item->kondisi}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
