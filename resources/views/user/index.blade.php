@extends('layouts.app')
@section('content')
    <div style="margin: 20px;">
        <a class="btn btn-outline-info m-2" href='{{route('user.create')}}';">Tambah Data</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Nama</th>
                    <th scope="col" class="text-center">E-mail</th>
                    <th scope="col" class="text-center">Role</th>
                    <th scope="col" class="text-center">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td >{{ $loop->iteration }}</td>
                    <td >{{ $item->nama}}</td>
                    <td >{{ $item->email }}</td>
                    <td >{{ $item->role}}</td>
                    <td scope="col" class="text-center">
                        <div class="d-flex justify-content-center gap-2">
                        <a class="btn btn-outline-success me-2" href="{{route('user.edit',$item->id)}}">Edit</a>
                        <form action="{{route('user.destroy',$item->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger me-2" type="submit">Hapus</button>
                        </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
