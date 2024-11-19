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
        $barang = Barang::all();
        return view('pages.kerusakan.tambahkerusakan', compact('users', 'barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nama'               => 'required', 
            'Barang'             => 'required',
            'Tanggal pengecekan' => 'required', 
            'Deskripsi'          =>'required',
            'status'               => 'required', 
        ], [
            'Nama.required'          => 'Nama harus diisi',
            'Barang.required'         => 'barang harus diisi',  
            'Tanggal pengecekan.required'=> 'tanggal pengecekan harus diisi', 
            'Deskripsi.required'          => 'deskripsi harus diisi',
            'status.required'              =>'status harus diisi',
        ]);
    
        // Find kerusakan by id and update fields
        $kerusakan =nama ::findOrFail($id);
        $kerusakan->nama = $request->input('nama');
        $kerusakan->barang = $request->input('barang');
        $kerusakan->tanggalpengecekan = $request->input('tanggal pengecekan');
        $kerusakan->deskripsi = $request->input('deskripsi');
        $kerusakan->status = $request->input('status');
    
        $kerusakan->save();
    
        return redirect('/datakerusakan')->with('success', 'kerusakan updated successfully.');
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
    