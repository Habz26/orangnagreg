@extends('layouts.app')
@section('content')
    <div style="margin: 25%;">
        <form action="{{route('tanah.store')}}" method="post">
            @csrf
        <table class="table table-striped">
            <tr>
                <td scope="row" class="text-center">Nama Tanah</td>
                <td scope="row" class="text-center"></td>
                <td scope="row" class="text-center"><input type="text" name="nama_tanah" id="" value="{{ old('nama_tanah') }}"></td>
                <td scope="row" class="text-center"><input type="hidden" name="id" id=""></td>
            </tr>
            <tr>
                <td scope="row" class="text-center">Kode Tanah</td>
                <td scope="row" class="text-center"></td>
                <td scope="row" class="text-center"><input type="text" name="kode_tanah" id="" value="{{ old('kode_tanah') }}"></td>
            </tr>
            <tr>
                <td scope="row" class="text-center">Luas</td>
                <td scope="row" class="text-center"></td>
                <td scope="row" class="text-center"><input type="text" name="luas" id="" value="{{ old('luas') }}"></td>
            </tr>
            <tr>
                <td scope="row" class="text-center">No Sertifikat</td>
                <td scope="row" class="text-center"></td>
                <td scope="row" class="text-center"><input type="text" name="no_sertifikat" id="" value="{{ old('no_sertifikat') }}"></td>
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