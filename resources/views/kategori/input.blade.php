@extends('layouts.app')
@section('content')
    <div style="margin: 25%;">
        <form action="{{route('kategori.store')}}" method="post">
            @csrf
        <table>
            <tr>
                <td>Nama Kategori</td>
                <td>:</td>
                <td><input type="text" name="nama_kategori" id="" value="{{ old('nama_kategori') }}"></td>
                <td><input type="hidden" name="id" id=""></td>
            </tr>
            
            <tr>
                <td></td>
                <td><input type="submit" value="SIMPAN" id=""></td>
                <td><button type="reset" style="border-radius: 5px;">BATAL</button></td>
            </tr>
        </table>
    </form>
    </div>

    @endsection