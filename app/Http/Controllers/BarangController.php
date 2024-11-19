<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    // Display all items
    public function index(){
        $barangs = Barang::all();
        return view("pages.barang.databarang", compact('barangs'));
    }

    // Show form to create new itemp
    public function create(){
        return view('pages.barang.tambahbarang');
    }

    // Store new item to database
    public function store(Request $request){
        // Validate the request data
        $request->validate([
            'nama_barang' => 'required|max:255',
            'lokasi' => 'required',
            'jml_barang' => 'required|integer',
            'stok_barang' => 'required|integer',
            'harga' => 'required|numeric'
        ],[


                'nama_barang.required'   => 'nama barang harus di isi',
                'nama_barang.max'        => 'nama produk maksimal 255',
                'lokasi.required'        => 'lokasi harus di isi',
                'jml_barang.required'    => 'jumlah barang harus di isi',
                'stok_barang.required'   => 'stok barang harus di isi',
                'harga.required'         => 'harga harus di isi'
            ]);

        $storeDataBarang=[

            'nama_barang'  => $request -> nama_barang,
            'lokasi'       => $request -> lokasi,
            'jml_barang'   => $request -> jml_barang,
            'stok_barang'  => $request -> stok_barang,
             'harga'       => $request -> harga

        ];

        // Create and save new Barang instance
        Barang::create($storeDataBarang);

        return redirect('/databarang');
    }
    
    // DELETE BARANG
    public function destroy($id)
    {
        $barangs = Barang::find($id);
        
        $barangs->delete();

        return redirect('/databarang');
    }

    public function edit($id)
    {
        $dataBarang = Barang::find($id);
        return view('pages.Barang.editBarang',compact('dataBarang')); 
    }

    public function updatebarang(Request $request, $id) {
        $request->validate([
            'nama_barang' => "required",
            'lokasi' => "required",
            'jml_barang' => "required",
            'stok_barang' => "required",
            'harga' => "required",
        ], [
            'nama_barang.required' => "Nama barang harus diisi",
            'lokasi.required' => "Lokasi harus diisi",
            'jml_barang.required' => "Jumlah harus diisi",
            'stok_barang.required' => "Stok harus diisi",
            'harga.required' => "Harga harus diisi",
        ]);
    
        $updateDatabarang = [
            'nama_barang' => $request->nama_barang,
            'lokasi' => $request->lokasi,
            'jml_barang' => $request->jml_barang,
            'stok_barang' => $request->stok_barang,
            'harga' => $request->harga,
        ];
    
        $dataBarang = Barang::find($id);
        if ($dataBarang) {
            $dataBarang->update($updateDatabarang);
            return redirect('/databarang')->with('success', 'Data barang berhasil diperbarui');
        }
    
        return redirect('/databarang')->with('error', 'Data barang tidak ditemukan');
    }
    
}




