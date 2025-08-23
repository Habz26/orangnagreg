@extends('layouts.app')
@section('content_bangunan')
    <div style="margin: 20px;">
        <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; text-align: center;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Bangunan</th>
                    <th>Kode Bangunan</th>
                    <th>Tanah ID</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_bangunan}}</td>
                    <td>{{ $item->kode_bangunan}}</td>
                    <td>{{ $item->tanah_id}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
