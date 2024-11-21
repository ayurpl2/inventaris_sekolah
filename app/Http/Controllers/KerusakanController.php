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
    // Memuat relasi dengan user dan barang
    $kerusakans = Kerusakan::with(['peminjam', 'barang'])->get();

    return view('pages.kerusakan.datakerusakan', compact('kerusakans'));
}


    public function create()
    {
        $users = User::where('role', 'user')->get(); // Hanya pengguna dengan role admin
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



public function edit($id)
{
    // Fetch the specific kerusakan record with related user and barang data
    $datakerusakan = Kerusakan::with('user', 'barang')->findOrFail($id);

    $barangs =Barang::all();
    // Fetch users with the role 'user' for the dropdown
    $users = User::where('role', 'user')->get();

    return view('pages.kerusakan.editkerusakan', compact('datakerusakan', 'barangs', 'users'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'user_id'           => 'required|exists:users,id',  // Ensure user exists
        'barang_id'         => 'required' ,
        'tgl_pengecekan'    => 'required|date',             // Ensure valid date
        'deskripsi'         => 'required|string|max:255',   // Limit description length
        'setatus'            => 'required', // Validate allowed statuses
    ], [
        // Custom error messages
        'user_id.required'        => 'Nama peminjam harus dipilih.',
        'barang_id.required'      => 'Barang harus dipilih.',
        'tgl_pengecekan.required' => 'Tanggal pengecekan harus diisi.',
        'deskripsi.required'      => 'Deskripsi harus diisi.',
        'status.required'         => 'Status harus diisi.',
    ]);

    // Update data kerusakan
    $datakerusakan = Kerusakan::findOrFail($id);
    $datakerusakan->user_id = $request->user_id;
    $datakerusakan->barang_id = $request->barang_id;
    $datakerusakan->tgl_pengecekan = $request->tgl_pengecekan;
    $datakerusakan->deskripsi = $request->deskripsi;
    $datakerusakan->setatus = $request->setatus;
    $datakerusakan->save();

    return redirect('/datakerusakan')->with('success', 'Data kerusakan berhasil diperbarui.');
}





        public function destroy($id)
        {
            $item = kerusakan::findOrFail($id);
            $item->delete();
            return redirect('/datakerusakan')->with('success','kerusakan berhasil dihapus.');
        }


    }
