@extends('layouts.app')
@section('content')
    <div style="margin: 20px;">
        <form action="{{route('barang.store')}}" method="post">
            @csrf
        <table>
            <tr>
                <td>Nama Barang</td>
                <td>:</td>
                <td><input type="text" name="nama_barang" id=""></td>
                <td><input type="hidden" name="id" id=""></td>
            </tr>
            <tr>
                <td>Kode Inventaris</td>
                <td>:</td>
                <td><input type="text" name="kode_inventaris" id=""></td>
            </tr>
            <tr>
                <td>Kategori ID</td>
                <td>:</td>
                <td><input type="text" name="kategori_id" id=""></td>
            </tr>
            <tr>
                <td>Ruangan ID</td>
                <td>:</td>
                <td><input type="text" name="ruangan_id" id=""></td>
            </tr>
            <tr>
                <td>Tahun Pengadaan</td>
                <td>:</td>
                <td><input type="text" name="tahun_pengadaan" id=""></td>
            </tr>
            <tr>
                <td>Sumber Dana</td>
                <td>:</td>
                <td><input type="text" name="sumber_dana" id=""></td>
            </tr>
            <tr>
                <td>Kondisi</td>
                <td>:</td>
                <td><input type="text" name="kondisi" id=""></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="SIMPAN" id=""></td>
                <td><button style="border-radius: 5px;"><a href="#" style="text-decoration: none; color:white;">BATAL</a></button></td>
            </tr>
        </table>
    </form>
    </div>

    @endsection