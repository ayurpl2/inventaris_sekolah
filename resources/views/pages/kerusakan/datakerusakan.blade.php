@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Pengecekan List</h4>
        <h5><a href="/tambahkerusakan" class="btn btn-info">tambah pengecekan</a></h5>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-dark">No</th>
                    <th class="text-dark">Nama</th>
                    <th class="text-dark">Barang</th>
                    <th class="text-dark">Tanggal Pengecekan</th>
                    <th class="text-dark">Deskripsi</th>
                    <th class="text-dark">Setatus</th>
                    <th class="text-dark">Aksi</th>
                </tr>
            </thead>
            <tbody>
                

                @foreach ($kerusakans as $item)
                    <tr>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->barang->name }}</td>
                        <td>{{ $item->tgl_pengecekan }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>{{ $item->setatus }}</td>
                        

                        <td>
                            <a href="/editkerusakan/{{$item->id}}">edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
