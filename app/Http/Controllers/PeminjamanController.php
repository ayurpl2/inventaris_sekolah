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
        
        $request->validate([
            'nama_peminjam' => 'required|string|max:255',
            'barang' => 'required|string|max:255',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date',
            'jumlah_pinjaman' => 'required|integer',
        ], [
            'nama_peminjam.required' => 'Nama peminjam wajib diisi.',
            'barang.required'           => 'Barang wajib diisi.',
            'tanggal_pinjam.required' => 'Tanggal pinjam wajib diisi.',
            'tanggal_kembali.required' => 'Tanggal kembali wajib diisi.',
            'jumlah_pinjaman.required' => 'Jumlah pinjaman wajib diisi.',
            'jumlah_pinjaman.integer' => 'Jumlah pinjaman harus berupa angka.'
        ]);
        
        // Temukan dan update data peminjaman
        $peminjam = Peminjam::findOrFail($id);
        $peminjam->update([
            'nama_peminjam' => $request->nama_peminjam,
            'barang' => $request->barang, // Ubah dari judul_buku ke barang
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'jumlah_pinjaman' => $request->jumlah_pinjaman,
        ]);

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
