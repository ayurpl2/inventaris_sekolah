@extends('layouts.app')
@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tabel Peminjam</h4>
            <a href="/tambahpeminjam" class="btn btn-info">tambah peminjam</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-responsive-sm">
                    <thead>
                        <tr>
                            <th class="text-dark">No</th>
                            <th class="text-dark">Name</th>
                            <th class="text-dark">Barang</th>
                            <th class="text-dark">Tanggal Peminjaman</th>
                            <th class="text-dark">Tanggal Pengembalian</th>
                            <th class="text-dark">Jumlah Pinjaman</th>
                            <th class="text-dark">Aksi</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach($peminjamans as $key => $peminjaman)
                        <tr>
                            <td class="text-dark">{{ $key + 1 }}</td>
                            <td class="text-dark">{{ $peminjaman->user ? $peminjaman->user->nama : 'tidak ada' }}</td>
                            <td class="text-dark">{{ $peminjaman->barang->barang_id}}</td>
                            <td class="text-dark">{{ $peminjaman->tgl_peminjam }}</td>
                            <td class="text-dark">{{ $peminjaman->tgl_pengembalian }}</td>
                            <td class="text-dark">{{ $peminjaman->jml_pinjaman }}</td>
                            <td>
                                <a href="/editpinjamanan/{{$peminjaman->id}}"
                                    class="btn btn-warning text-white">Edit</a>
                                   
                                    <a onClick="return confirm('apaka anda yakin ingin menghapus?')"
                                    href="/peminjaman/destroy/{{ $peminjaman->id }}"
                                     class="btn btn-danger text-black">Hapus</a>
                                </form>    
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
