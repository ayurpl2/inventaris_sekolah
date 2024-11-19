<?php

namespace App\Models;

use App\Models\Kerusakan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $fillable=[
        'nama_barang',
        'lokasi',
        'jml_barang',
        'stok_barang',
        'harga'

    ];
    public function barangs()
    {
        return $this->belongsTo(peminjam::class, 'peminjam_id');
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

}
