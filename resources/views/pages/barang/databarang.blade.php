@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Data Barang</h4>
        <a href="/tambahbarang" class="btn btn-info">Tambah Barang</a>
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
                                <a href="/editbarang/{{ $barang->id }}" class="btn btn-warning">Edit</a>
                                <form action="/deletebarang/{{ $barang->id }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</button>
                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
