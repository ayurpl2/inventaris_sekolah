@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Edit Pengecekan</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form action="/updatekerusakan/{{ $datakerusakan->id }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Nama</label>
                    <input name="datauser" type="text" value="{{ $datakerusakan->nama }}" class="form-control" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                    <label>Barang</label>
                    <select name="barang" class="form-control" required>
                        <option value="pensil" {{ $datakerusakan->barang == 'pensil' ? 'selected' : '' }}>Pensil</option>
                        <option value="pulpen" {{ $datakerusakan->barang == 'pulpen' ? 'selected' : '' }}>Pulpen</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tanggal Pengecekan</label>
                    <input name="tanggalpengecekan" type="text" value="{{ $datakerusakan->tanggalpengecekan }}" class="form-control" placeholder="Enter Date" readonly>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <input name="deskripsi" type="text" value="{{ $datakerusakan->deskripsi }}" class="form-control" placeholder="Enter Description" readonly>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" required>
                        <option value="rusak" {{ $datakerusakan->status == 'rusak' ? 'selected' : '' }}>Rusak</option>
                        <option value="tidak rusak" {{ $datakerusakan->status == 'tidak rusak' ? 'selected' : '' }}>Tidak Rusak</option>
                    </select>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" disabled>
                    <label class="form-check-label">
                        Can't check this
                    </label>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>
