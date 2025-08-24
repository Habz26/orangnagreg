@extends('layouts.app')
@section('content')
    <div style="margin: 25%;">
        <form action="{{route('user.store')}}" method="post">
            @csrf
        <table class="table table-striped">
            <tr>
                <td scope="row" class="text-center">Nama</td>
                <td scope="row" class="text-center"></td>
                <td scope="row" class="text-center"><input type="text" name="nama" id="" value="{{ old('nama') }}"></td>
                <td scope="row" class="text-center"><input type="hidden" name="id" id=""></td>
            </tr>
            <tr>
                <td scope="row" class="text-center">E-mail</td>
                <td scope="row" class="text-center"></td>
                <td scope="row" class="text-center"><input type="email" name="email" id="" value="{{ old('email') }}"></td>
            </tr>
            <tr>
                <td scope="row" class="text-center">Password</td>
                <td scope="row" class="text-center"></td>
                <td scope="row" class="text-center"><input type="password" name="password" id="" value="{{ old('password') }}"></td>
            </tr>
            <tr>
                <td scope="row" class="text-center">Role</td>
                <td scope="row" class="text-center"></td>
                <td scope="row" class="text-center"><input type="text" name="role" id="" value="{{ old('role') }}"></td>
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