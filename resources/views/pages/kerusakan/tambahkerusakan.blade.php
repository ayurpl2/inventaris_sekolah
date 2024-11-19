@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Tambah Pengecekan</h4>
    </div>
    <div class="card-body">
        <form action="/store/kerusakan" method="POST">
            @csrf
            <div class="form-group">
                <label class="text-dark">Nama</label>
                <select name="user_id" id="" class="from-control">
                    <option value="" selected>Pilih user</option>
                    @foreach ($users as $user)
                        <option {{old('user_id') == $user->id ? 'selected' : ''}}
                            value="{{ $user->id }}">
                            {{ $user->nama}}</option>
                    @endforeach
                        </select>
            </div>
            <div class="form-group">
                <label class="text-dark">Barang</label>
                <select name="barang_id" id="" class="from-control">
                    <option value="" selected>Pilih barang</option>
                    @foreach ($barangs as $barang)
                        <option {{old('barang_id') == $barang->id ? 'selected' : ''}}
                            value="{{ $barang->id }}">
                            {{ $barangs->barang}}</option>
                    @endforeach
                        </select>
            </div>
            <div class="form-group">
                <label class="text-dark">Tanggal Pengecekan</label>
                <input name="tgl_pengecekan" type="date" class="form-control" placeholder="Masukan Tanggal Pengecekan">
            </div>
            <div class="form-group">
                <label class="text-dark">Deskripsi</label>
                <input name="deskripsi" type="text" class="form-control" placeholder="Masukan Deskripsi">
            </div>
            <div class="form-group">
                <label class="text-dark">Setatus</label>
                <select name="setatus" class="form-control">
                    <option value="baik">Baik</option>
                    <option value="rusak">Rusak</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
</div>
@endsection
