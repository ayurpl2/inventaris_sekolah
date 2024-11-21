<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Peminjam;
use App\Models\Kerusakan;
use Illuminate\Http\Request;

class DasboarController extends Controller
{
    //
    public function index()
    {
        $pinjamanbarang = Peminjam::count();
        $barang = Barang::where('stok_barang', '>', 0)->count();
        $rusak = Kerusakan::where('setatus', 'rusak')->count(); // Misalnya 1 mewakili status 'rusak'
        $baik = Kerusakan::where('setatus', 'baik')->count();
        $totaladmin = User::where('role', 'user')->count();


        return view('pages.dashboard.index',compact('pinjamanbarang','barang','rusak','baik','totaladmin'));
    }
}
