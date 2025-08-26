@extends('layouts.app')
@section('content')
    <div style="margin: 25%;">
        <form action="{{route('barang.update',$item->id)}}" method="post">
            @csrf
            @method('PUT')
        <table class="table table-striped">
            <tr>
                <td scope="row" class="text-center">Nama Barang</td>
                <td scope="row" class="text-center"></td>
                <td scope="row" class="text-center"><input type="text" name="nama_barang" id="" value="{{ old('nama_barang',$item->nama_barang) }}"></td>
                <td scope="row" class="text-center"><input type="hidden" name="id" id=""></td>
            </tr>
            <tr>
                <td scope="row" class="text-center">Kode Inventaris</td>
                <td scope="row" class="text-center"></td>
                <td scope="row" class="text-center"><input type="text" name="kode_inventaris" id="" value="{{ old('kode_inventaris',$item->kode_inventaris) }}"></td>
            </tr>
            <tr>
                <td scope="row" class="text-center">Kategori ID</td>
                <td scope="row" class="text-center"></td>
                <td scope="row" class="text-center"><input type="text" name="kategori_id" id="" value="{{ old('kategori_id',$item->kategori_id) }}"></td>
            </tr>
            <tr>
                <td scope="row" class="text-center">Ruangan ID</td>
                <td scope="row" class="text-center"></td>
                <td scope="row" class="text-center"><input type="text" name="ruangan_id" id="" value="{{ old('ruangan_id',$item->ruangan_id) }}"></td>
            </tr>
            <tr>
                <td scope="row" class="text-center">Tahun Pengadaan</td>
                <td scope="row" class="text-center"></td>
                <td scope="row" class="text-center"><input type="text" name="tahun_pengadaan" id="" value="{{ old('tahun_pengadaan',$item->tahun_pengadaan) }}"></td>
            </tr>
            <tr>
                <td></td>
                <td scope="row" class="text-center"><input type="submit" value="SIMPAN" id=""></td>
                <td scope="row" class="text-center"><button type="reset" style="border-radius: 5px;">BATAL</button></td>
            </tr>
        </table>
    </form>
    </div>

    @endsection