<?php

namespace App\Http\Controllers;

use App\Models\Kerusakan;
use App\Models\User;
use App\Models\Barang;
use Illuminate\Http\Request;

class KerusakanController extends Controller
{
    public function index()
    {
        $kerusakans = Kerusakan::with(['user', 'barang'])->get();
        return view('pages.kerusakan.datakerusakan', compact('kerusakans'));
    }

    public function create()
    {
        $users = User::all();
        $barangs = Barang::all();
        return view('pages.kerusakan.tambahkerusakan', compact('users', 'barangs'));
    }

    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'user_id'          => 'required|integer', // ID pengguna yang terkait
        'barang_id'        => 'required|integer', // ID barang yang terkait
        'tgl_pengecekan'   => 'required|date',    // Tanggal pengecekan harus format tanggal
        'deskripsi'        => 'required|string', // Deskripsi wajib diisi
        'setatus'          => 'required|string', // Status harus diisi
    ], [
        // Pesan error kustom
        'user_id.required'        => 'Pengecek (admin) harus dipilih.',
        'barang_id.required'      => 'Barang harus dipilih.',
        'tgl_pengecekan.required' => 'Tanggal pengecekan harus diisi.',
        'deskripsi.required'      => 'Deskripsi harus diisi.',
        'setatus.required'        => 'Status harus diisi.',
    ]);

    // Simpan data kerusakan ke database
    $kerusakan = new Kerusakan(); // Pastikan model bernama `Kerusakan`
    $kerusakan->user_id = $request->user_id; // ID admin/pengecek
    $kerusakan->barang_id = $request->barang_id; // ID barang yang diperiksa
    $kerusakan->tgl_pengecekan = $request->tgl_pengecekan; // Tanggal pengecekan
    $kerusakan->pengecek_id = auth()->user()->id; // Pengecek otomatis diisi admin yang login
    $kerusakan->deskripsi = $request->deskripsi; // Deskripsi kerusakan
    $kerusakan->setatus = $request->setatus; // Status pengecekan

    $kerusakan->save(); // Simpan data ke database

    return redirect('/datakerusakan')->with('success', 'Data kerusakan berhasil disimpan.');
}



    public function edit($id) {
        $datakerusakan = Kerusakan::findOrFail($id); // Corrected 'findOrfile' to 'findOrFail'
        return view('pengaduan', compact('datakerusakan')); // Corrected view path
    }

    public function update(Request $request, $id) {
        $request->validate([
            'Nama' => 'required',
            'Barang' => 'required',
            'Tanggal pengecekan' => 'required',
            'Deskripsi' => 'required',
            'status' => 'required',
        ], [
            'Nama.required' => 'Nama harus diisi',
            'Barang.required' => 'Barang harus diisi',
            'Tanggal pengecekan.required' => 'Tanggal pengecekan harus diisi',
            'Deskripsi.required' => 'Deskripsi harus diisi',
            'status.required' => 'Status harus diisi',
        ]);

        // Assuming Kerusakan is an Eloquent model
        $datakerusakan = Kerusakan::findOrFail($id); // Corrected 'findOrfile' to 'findOrFail'
        $datakerusakan->Nama = $request->Nama;
        $datakerusakan->Barang = $request->Barang;
        $datakerusakan->Tanggal_pengecekan = $request->input('Tanggal pengecekan');
        $datakerusakan->Deskripsi = $request->Deskripsi;
        $datakerusakan->status = $request->status;
        $datakerusakan->save();

        return redirect()->route('pengaduan.index')->with('success', 'Data berhasil diupdate');
    }



        public function destroy($id)
        {
            $kerusakans = kerusakan::find($id);
            $kerusakans->delete();
            return redirect('/datakerusakan')->with('success','kerusakan berhasil dihapus.');
        }


    }
