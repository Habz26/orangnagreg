@extends('layouts.app')
@section('content')
    <div style="margin: 25%;">
        <form action="{{route('kategori.update',$item->id)}}" method="post">
            @csrf
            @method('PUT')
        <table>
            <tr>
                <td>Nama Kategori</td>
                <td>:</td>
                <td><input type="text" name="nama_kategori" value="{{ old('nama_kategori',$item->nama_kategori) }}"></td>
                <td><input type="hidden" name="id" id=""></td>
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