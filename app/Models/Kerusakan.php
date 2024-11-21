<?php

namespace App\Models;

use App\Models\User;
use App\Models\Barang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kerusakan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'barang_id',
        'tgl_pengecekan',
        'pengecek_id',
        'deskripsi',
        'setatus'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function pengecek()
    {
        return $this->belongsTo(User::class, 'pengecek_id');
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
    public function peminjam()
{
    return $this->belongsTo(User::class, 'user_id');
}

}
