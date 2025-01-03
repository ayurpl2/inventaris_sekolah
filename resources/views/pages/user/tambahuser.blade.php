@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Tambah User</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form action="/storeUser" method="POST">
                @csrf
                <div class="form-group">
                    <label class="text-dark">Nama</label>
                    <input value="{{ old('nama') }}" name="nama" type="text" class="form-control" placeholder="Masukkan Nama"> <!-- Corrected usage of old() -->
                </div>
                <div class="form-group">
                    <label class="text-dark">Email</label>
                    <input value="{{ old('email') }}" name="email" type="text" class="form-control" placeholder="Masukkan Email"> <!-- Corrected usage of old() -->
                </div>
                <div class="form-group">
                    <label class="text-dark">Password</label>
                    <input name="password" type="password" class="form-control" placeholder="Masukkan Password"> <!-- Removed value attribute for password input for security -->
                </div>
                <div class="form-group">
                    <label class="text-dark">Role</label>
                    <select name="role" class="form-control">
                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>user</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>admin</option>
                    </select> <!-- Corrected usage of old() for select -->
                </div>
                
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
