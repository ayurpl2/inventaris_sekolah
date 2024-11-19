<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Peminjam;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    // Menampilkan daftar peminjaman
    public function index()
    {
        $peminjamans = Peminjam::all();
        return view("pages.data.datapeminjam", compact('peminjamans'));
    }

    public function create(){
        $peminjamans = Peminjam::all();
        $barangs = Barang::all();
        return view('pages.data.tambah',compact('peminjamans','barangs'));
    }

    // Menyimpan data peminjaman baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'user_id' => 'required|string|max:255',
            'barang_id' => 'required|string|max:255', // Ubah dari judul_buku ke barang_id
            'tgl_peminjam' => 'required|date',
            'tgl_pengembalian' => 'required|date',
            'jml_pinjaman' => 'required|integer',
        ]);

        // Simpan data peminjaman
        $storeDataPeminjaman=[
            'user_id' => $request->user_id,
            'barang_id' => $request->barang_id, // Ubah dari judul_buku ke barang
            'tgl_peminjam' => $request->tgl_peminjam,
            'tgl_pengembalian' => $request->tgl_pengembalian,
            'jml_pinjaman' => $request->jml_pinjaman,
        ];
        peminjam::create($storeDataPeminjaman);
        return redirect('/datapeminjam')->with('berhasil', 'Data peminjaman berhasil ditambahkan');
    }

    // Mengedit data peminjaman yang sudah ada
    public function edit($id)
    {
        $peminjam = Peminjam::findOrFail($id);
        $users = User::all();
        $barangs = Barang::all();
        return view("pages.data.editpinjaman", compact('peminjam','users','barangs'));
    }

    // Mengupdate data peminjaman yang sudah ada
    public function updatePeminjaman(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'user_id' => 'required|integer', // ID pengguna harus berupa integer
        'barang_id' => 'required|integer', // ID barang harus berupa integer
        'tgl_peminjam' => 'required|date', // Format tanggal
        'tgl_pengembalian' => 'required|date|after_or_equal:tgl_peminjam', // Tanggal pengembalian minimal sama atau setelah tanggal peminjaman
        'jml_pinjaman' => 'required|integer', // Jumlah pinjaman minimal 1
    ], [
        // Pesan error kustom (opsional)
        'user_id.required' => 'ID pengguna diperlukan.',
        'barang_id.required' => 'ID barang diperlukan.',
        'tgl_peminjam.required' => 'Tanggal peminjaman diperlukan.',
        'tgl_pengembalian.required' => 'Tanggal pengembalian diperlukan.',
        'tgl_pengembalian.after_or_equal' => 'Tanggal pengembalian harus setelah atau sama dengan tanggal peminjaman.',
        'jml_pinjaman.required' => 'Jumlah pinjaman diperlukan.',
    ]);

    // Temukan data peminjaman berdasarkan ID
    $peminjam = Peminjam::findOrFail($id);

    // Update data peminjaman
    $peminjam->update([
        'user_id' => $request->user_id, // ID pengguna dari input form
        'barang_id' => $request->barang_id, // ID barang dari input form
        'tgl_peminjam' => $request->tgl_peminjam, // Tanggal peminjaman
        'tgl_pengembalian' => $request->tgl_pengembalian, // Tanggal pengembalian
        'jml_pinjaman' => $request->jml_pinjaman, // Jumlah pinjaman
    ]);

    // Redirect dengan pesan sukses
    return redirect('/datapeminjam')->with('berhasil', 'Data peminjaman berhasil diupdate');
}


    // Menghapus data peminjaman
    public function destroy($id)
    {
        $peminjams = Peminjam::findOrFail($id);
        $peminjams->delete();

        return redirect('/datapeminjam');
    }
}
