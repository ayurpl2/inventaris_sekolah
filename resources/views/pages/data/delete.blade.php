extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">hapus Peminjam</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form>
                    <div class="form-group">
                        <label>Name</label>
                        <input name="nama"type="text" class="form-control" placeholder="Disabled input">
                    </div>
                    <div class="form-group">
                        <label>Barang</label>
                        <input name="nama" type="text" class="form-control" placeholder="Disabled input">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Peminjam</label>
                        <input name="nama"type="text" class="form-control" placeholder="Disabled input">
                    </div>
                    <div class="form-group">
                        <label>Tanggal pengembalian</label>
                        <input name="nama"type="text" class="form-control" placeholder="Disabled input">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Peminjaman</label>
                        <select class="form-control">
                            <option>Disabled select</option>
                            <option>Disabled select</option>
                        </select>
                    </div>
                    <button name="nama"type="submit" class="btn btn-primary mt-3">delete</button>
            </form>
        </div>
    </div>
</div>


@endsection