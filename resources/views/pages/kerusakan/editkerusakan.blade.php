@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Edit Pengecekan</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form action="/updatekerusakan/{{ $datakerusakan->id }}" method="POST">
                @csrf

                <!-- Nama Peminjam -->
                <div class="form-group">
                    <label class="text-dark">Nama Peminjam</label>
                    <select name="user_id" class="form-control">
                        <option value="" disabled selected>Pilih peminjam</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}"
                                {{ old('user_id', $datakerusakan->user_id) == $user->id ? 'selected' : '' }}>
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
                    <label>Barang</label>
                    <select name="barang_id" class="form-control">
                        <option value="" disabled selected>Pilih Barang</option>
                        @foreach($barangs as $barang)
                            <option value="{{ $barang->id }}" {{ $barang->id == $barang->barang_id ? 'selected' : '' }}>
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
                        value="{{ $datakerusakan->tgl_pengecekan }}">
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
                        value="{{$datakerusakan->deskripsi }}">
                    @error('deskripsi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label>Status</label>
                    <select name="setatus" class="form-control">
                        <option value="rusak" {{  $datakerusakan->status == 'rusak' ? 'selected' : '' }}>Rusak</option>
                        <option value="tidak rusak" {{  $datakerusakan->status == 'tidak rusak' ? 'selected' : '' }}>Tidak Rusak</option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary mt-3">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
