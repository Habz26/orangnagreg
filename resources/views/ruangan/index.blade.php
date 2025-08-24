@extends('layouts.app')
@section('content')
    <div style="margin: 20px;">
        <a class="btn btn-outline-info m-2" href='{{route('ruangan.create')}}';">Tambah Data</a>
        <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; text-align: center;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Ruangan</th>
                    <th>Kode Ruangan</th>
                    <th>Bangunan ID</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_ruangan}}</td>
                    <td>{{ $item->kode_ruangan }}</td>
                    <td>{{ $item->bangunan_id }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
