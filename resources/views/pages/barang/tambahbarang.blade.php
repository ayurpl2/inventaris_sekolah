@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Tambah Barang</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form action="/store/barang" method="POST">
                @csrf
                <div class="form-group">
                    <label class="text-dark">Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" placeholder="Masukan Nama Barang" required>
                </div>
                <div class="form-group">
                    <label class="text-dark">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" placeholder="Masukan Lokasi" required>
                </div>
                <div class="form-group">
                    <label class="text-dark">Jumlah Barang</label>
                    <input type="number" name="jml_barang" class="form-control" placeholder="Masukkan Jumlah Barang" required>
                </div>
                <div class="form-group">
                    <label class="text-dark">Stok Barang</label>
                    <input type="number" name="stok_barang" class="form-control" placeholder="Masukkan Stok Barang" required>
                </div>
                <div class="form-group">
                    <label class="text-dark">Harga</label>
                    <input type="number" name="harga" class="form-control" placeholder="Masukkan Harga" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
