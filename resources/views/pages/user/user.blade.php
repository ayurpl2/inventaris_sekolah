@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Data user</h4>
        <a href="/tambahuser"><h4 class="btn btn-info">tambah user</h4></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover text-dark table-responsive-sm">
                <thead>
                    <tr>
                        <th class="text-dark">No</th>
                        <th class="text-dark">Nama</th>
                        <th class="text-dark">email</th>
                        <th class="text-dark">Role</th>
                        <th class="text-dark">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$user->nama}}</td>
                        <td>{{$user->email }}</td>
                        <td>{{$user->role }}</td>

                        <td>
                            <a href="/editUser/{{ $user->id}}" class="btn btn-warning ">edit</a>

                                <a href="/destroy/user/{{ $user->id }}"
                                    class="btn btn-danger btn-warning"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Hapus</a>


                        <tr>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
