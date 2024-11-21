@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Tambah Pengecekan</h4>
    </div>
    <div class="card-body">
        <form action="/store/kerusakan" method="POST">
            @csrf
            <!-- Nama Pengecek -->
            <div class="form-group">
                <label class="text-dark">Nama peminjam</label>
                <select name="user_id" class="form-control">
                    <option value="" selected disabled>Pilih peminjam</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->nama }} ({{ $user->role }})
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <!-- Barang -->
            <div class="form-group">
                <label class="text-dark">Barang</label>
                <select name="barang_id" class="form-control">
                    <option value="" selected disabled>Pilih barang</option>
                    @foreach($barangs as $barang)
                        <option value="{{ $barang->id }}"
                            {{ old('barang_id') == $barang->id ? 'selected' : '' }}>
                            {{ $barang->nama }}
                        </option>
                    @endforeach
                </select>
                @error('barang_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Tanggal Pengecekan -->
            <div class="form-group">
                <label class="text-dark">Tanggal Pengecekan</label>
                <input name="tgl_pengecekan" type="date"
                       class="form-control"
                       value="{{ old('tgl_pengecekan') }}">
                @error('tgl_pengecekan')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div class="form-group">
                <label class="text-dark">Deskripsi</label>
                <input name="deskripsi" type="text"
                       class="form-control"
                       placeholder="Masukan Deskripsi"
                       value="{{ old('deskripsi') }}">
                @error('deskripsi')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Status -->
            <div class="form-group">
                <label class="text-dark">Status</label>
                <select name="setatus" class="form-control">
                    <option value="baik" {{ old('setatus') == 'baik' ? 'selected' : '' }}>Baik</option>
                    <option value="rusak" {{ old('setatus') == 'rusak' ? 'selected' : '' }}>Rusak</option>
                </select>
                @error('setatus')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
</div>
@endsection
