@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Edit Barang</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form action="/updatebarang/{{$dataBarang->id}}" method="post">
                @csrf
                <div class="form-group">
                    <label class="text-dark">Nama Barang</label>
                    <input name="nama_barang" type="text" value="{{$dataBarang->nama_barang}}" class="form-control" placeholder="Masukan Nama Barang" required>
                    @error('nama_barang')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-dark">Lokasi</label>
                    <input name="lokasi" type="text" value="{{$dataBarang->lokasi}}" class="form-control" placeholder="Masukan Lokasi" required>
                    @error('lokasi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-dark">Jumlah Barang</label>
                    <input type="text" name="jml_barang" value="{{$dataBarang->jml_barang}}" class="form-control" placeholder="Masukkan Jumlah Barang" required>
                    @error('jml_barang')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-dark">Stok Barang</label>
                    <input type="text" name="stok_barang" value="{{$dataBarang->stok_barang}}" class="form-control" placeholder="Masukkan Stok Barang" required>
                    @error('stok_barang')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="text-dark">Harga</label>
                    <input type="text" name="harga" value="{{$dataBarang->harga}}" class="form-control" placeholder="Masukkan Harga" required>
                    @error('harga')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
