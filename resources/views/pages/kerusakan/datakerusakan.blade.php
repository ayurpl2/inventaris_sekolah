@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Pengecekan List</h4>
        <h5><a href="/datapeminjam" class="btn btn-info">tambah pengecekan</a></h5>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-dark">No</th>
                    <th class="text-dark">Nama</th>
                    <th class="text-dark">Barang</th>
                    <th class="text-dark">Tanggal Pengecekan</th>
                    <th class="text-dark">pengecek</th>
                    <th class="text-dark">Deskripsi</th>
                    <th class="text-dark">Setatus</th>
                    <th class="text-dark">Aksi</th>
                </tr>
            </thead>
            <tbody>


                @foreach ($kerusakans as $no=> $item)
                    <tr>
                        <td>{{ $no + 1}}</td>
                        <td>{{ $item->peminjam ? $item->peminjam->nama : "nama tidak ada" }}</td>
                        <td>{{ $item->barang ? $item->barang->nama_barang : 'Barang tidak ditemukan' }}</td>
                        <td>{{ $item->tgl_pengecekan }}</td>
                        <td>{{ $item->pengecek ? $item->pengecek->nama : "tidak ada"}}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>{{ $item->setatus }}</td>


                        <td>
                            <a href="/editkerusakan/{{$item->id}} " class="btn btn-warning">edit</a>
                                <a href="/destroy/kerusakan/{{ $item->id }}"
                                    class="btn btn-danger btn-warning"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
