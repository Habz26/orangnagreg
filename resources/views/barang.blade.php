@extends('layouts.app')
@section('content')
    <center><h1>Haii!!!</h1>
    <h4>Ini data barang kamu!</h4></center>
    <div style="margin: 20px;">
        <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; text-align: center;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Qty</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_barang}}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ number_format($item->harga, 2, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>