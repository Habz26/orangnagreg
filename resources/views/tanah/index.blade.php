@extends('layouts.app')
@section('content')
    <div style="margin: 20px;">
        <a class="btn btn-outline-info m-2" href='{{route('tanah.create')}}';">Tambah Data</a>
        <table border="" cellpadding="10" cellspacing="0" style="width: 100%; text-align: center; border-style: ridge;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Tanah</th>
                    <th>Kode Tanah</th>
                    <th>Luas</th>
                    <th>No Sertifikat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_tanah}}</td>
                    <td>{{ $item->kode_tanah}}</td>
                    <td>{{ $item->luas}}</td>
                    <td>{{ $item->no_sertifikat}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
