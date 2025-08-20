@extends('layouts.app')
@section('content_kategori')
    <div style="margin: 20px;">
        <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; text-align: center;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_kategori}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
