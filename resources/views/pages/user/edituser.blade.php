@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">edit user</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form action="/update/{{ $dataUser->id }}" method="post">
                @csrf
                <div class="form-group">
                    <label class="text-dark">Nama</label>
                    <input name="nama" type="text" value="{{ $dataUser->nama }}" class="form-control" placeholder="Masukan Nama" required>
                </div>
                <div class="form-group">
                    <label class="text-dark">Email</label>
                    <input name="email" type="text" value="{{ $dataUser->email }}" class="form-control" placeholder="Masukan Email" required>
                </div>
                <div class="form-group">
                    <label class="text-dark">Role</label>
                    <select name="role" class="form-control" required>
                        <option value="admin" {{ $dataUser->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="user" {{ $dataUser->role == 'user' ? 'selected' : '' }}>User</option>
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






@endsection