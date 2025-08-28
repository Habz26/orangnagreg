@extends('layouts.app')
@section('content')
    <div style="margin: 25%;">
        <form action="{{route('bangunan.update',$item->id)}}" method="post">
            @csrf
            @method('PUT')
        <table class="table table-striped">
            <tr>
                <td scope="row" class="text-center">Nama Bangunan</td>
                <td scope="row" class="text-center"></td>
                <td scope="row" class="text-center"><input type="text" name="nama_bangunan" id="" value="{{ old('nama_bangunan',$item->nama_bangunan) }}"></td>
                <td scope="row" class="text-center"><input type="hidden" name="id" id=""></td>
            </tr>
            <tr>
                <td scope="row" class="text-center">Kode Bangunan</td>
                <td scope="row" class="text-center"></td>
                <td scope="row" class="text-center"><input type="text" name="kode_bangunan" id="" value="{{ old('kode_bangunan',$item->kode_bangunan) }}"></td>
            </tr>
            <tr>
                <td scope="row" class="text-center">Tanah ID</td>
                <td scope="row" class="text-center"></td>
                <td scope="row" class="text-center"><input type="text" name="tanah_id" id="" value="{{ old('tanah_id',$item->tanah_id) }}"></td>
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