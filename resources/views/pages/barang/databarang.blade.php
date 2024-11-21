@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Data Barang</h4>
        @if (Auth::user()->role == 'admin')

        <a href="/tambahbarang" class="btn btn-info">Tambah Barang</a>
        @endif
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-responsive-sm">
                <thead>
                    <tr>
                        <th class="text-dark">No</th>
                        <th class="text-dark">Barang</th>
                        <th class="text-dark">Lokasi</th>
                        <th class="text-dark">Jumlah Barang</th>
                        <th class="text-dark">Stok Barang</th>
                        <th class="text-dark">Harga</th>
                        <th class="text-dark">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    </tr>
                    @foreach ($barangs as $index => $barang)
                        <tr>
                            <td class="text-dark">{{ $index + 1 }}</td>
                            <td class="text-dark">{{ $barang->nama_barang }}</td>
                            <td class="text-dark">{{ $barang->lokasi }}</td>
                            <td class="text-dark">{{ $barang->jml_barang }}</td>
                            <td class="text-dark">{{ $barang->stok_barang }}</td>
                            <td class="text-dark">{{ number_format($barang->harga, 0, ',', '.') }}</td>
                            <td>
                                @if (Auth::user()->role == 'admin')

                                <a href="/editbarang/{{ $barang->id }}" class="btn btn-warning">Edit</a>
                                <a onClick="return confirm('apaka anda yakin ingin menghapus?')"
                                href="/destroy/barang/{{ $barang->id }}"
                                class="btn btn-danger text-black">Hapus</a>
                                @endif
                                @if (Auth::user()->role == 'user')

                                <a href="/tambahpeminjam" class="btn btn-primary">Pinjam</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
