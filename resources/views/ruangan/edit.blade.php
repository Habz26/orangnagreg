@extends('layouts.app')
@section('content')
    <div style="margin: 25%;">
        <form action="{{route('ruangan.update',$item->id)}}" method="post">
            @csrf
            @method('PUT')
        <table class="table table-striped">
            <tr>
                <td scope="row" class="text-center">Nama Ruangan</td>
                <td scope="row" class="text-center"></td>
                <td scope="row" class="text-center"><input type="text" name="nama_ruangan" id="" value="{{ old('nama_ruangan',$item->nama_ruangan) }}"></td>
                <td scope="row" class="text-center"><input type="hidden" name="id" id=""></td>
            </tr>
            <tr>
                <td scope="row" class="text-center">Kode Ruangan</td>
                <td scope="row" class="text-center"></td>
                <td scope="row" class="text-center"><input type="text" name="kode_ruangan" id="" value="{{ old('kode_ruangan',$item->kode_ruangan) }}"></td>
            </tr>
            <tr>
                <td scope="row" class="text-center">Bangunan ID</td>
                <td scope="row" class="text-center"></td>
                <td scope="row" class="text-center"><input type="text" name="bangunan_id" id="" value="{{ old('bangunan_id',$item->bangunan_id) }}"></td>
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