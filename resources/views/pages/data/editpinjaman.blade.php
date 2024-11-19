@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Edit Peminjam</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form action="/updatePeminjaman/{{ $peminjam->id }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <select name="user_id" class="form-control" required>
                        <option value="" disabled>Select User</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ $peminjam->user_id == $user->id ? 'selected' : '' }}>
                                {{ $user->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label>Barang</label>
                    <select name="barang_id" class="form-control" required>
                        <option value="" disabled>Select Barang</option>
                        @foreach($barangs as $barang)
                            <option value="{{ $barang->id }}" {{ $peminjam->barang_id == $barang->id ? 'selected' : '' }}>
                                {{ $barang->nama_barang }}
                            </option>
                        @endforeach
                    </select>
                    @error('barang_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label>Tanggal Peminjam</label>
                    <input name="tgl_peminjam" type="date" class="form-control" value="{{ $peminjam->tgl_peminjam }}" required>
                    @error('tgl_peminjam')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Tanggal Pengembalian</label>
                    <input name="tgl_pengembalian" type="date" class="form-control" value="{{ $peminjam->tgl_pengembalian }}" required>
                    @error('tgl_pengembalian')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Jumlah Peminjaman</label>
                    <input name="jml_pinjaman" type="number" class="form-control" value="{{ $peminjam->jml_pinjaman }}" placeholder="Masukan jumlah pinjaman" required>
                    @error('jml_pinjaman')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
