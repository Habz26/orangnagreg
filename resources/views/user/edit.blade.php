@extends('layouts.app')
@section('content')
    <div style="margin: 25%;">
        <form action="{{route('user.update',$item->id)}}" method="post">
            @csrf
            @method('PUT')
        <table class="table table-striped">
            <tr>
                <td scope="row" class="text-center">Nama</td>
                <td scope="row" class="text-center"></td>
                <td scope="row" class="text-center"><input type="text" name="nama" id="" value="{{ old('nama',$item->nama) }}"></td>
                <td scope="row" class="text-center"><input type="hidden" name="id" id=""></td>
            </tr>
            <tr>
                <td scope="row" class="text-center">E-mail</td>
                <td scope="row" class="text-center"></td>
                <td scope="row" class="text-center"><input type="email" name="email" id="" value="{{ old('email',$item->email) }}"></td>
            </tr>
            <tr>
                <td scope="row" class="text-center">Role</td>
                <td scope="row" class="text-center"></td>
                <td scope="row" class="text-center"><input type="text" name="role" id="" value="{{ old('role',$item->role) }}"></td>
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