@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Tambah Peminjam</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
        <form action="/store/peminjam" method="POST">
            @csrf
            <!-- Input Name -->
            <div class="form-group">
                <label class="text-dark">Name</label>
                <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly disabled>
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                @error('user_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Select Barang -->
            <div class="form-group">
                <label class="text-dark">Barang</label>
                <select name="barang_id" class="form-control">
                    <option value="" selected disabled>Pilih barang</option>
                    @foreach($barangs as $barang)
                        <option value="{{ $barang->id }}" {{ old('barang_id') == $barang->id ? 'selected' : '' }}>
                            {{ $barang->nama }}
                        </option>
                    @endforeach
                </select>
                @error('barang_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Tanggal Peminjaman -->
            <div class="form-group">
                <label class="text-dark">Tanggal Peminjaman</label>
                <input name="tgl_peminjam" type="date" class="form-control" value="{{ old('tgl_peminjam') }}">
                @error('tgl_peminjam')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Tanggal Pengembalian -->
            <div class="form-group">
                <label class="text-dark">Tanggal Pengembalian</label>
                <input name="tgl_pengembalian" type="date" class="form-control" value="{{ old('tgl_pengembalian') }}">
                @error('tgl_pengembalian')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Jumlah Pinjam -->
            <div class="form-group">
                <label class="text-dark">Jumlah Pinjam</label>
                <input name="jml_pinjaman" type="number" class="form-control" placeholder="Masukan jumlah pinjaman" value="{{ old('jml_pinjaman') }}">
                @error('jml_pinjaman')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>

        </div>
    </div>
</div>

@endsection
