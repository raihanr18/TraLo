<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tiket extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'no_pesanan',
        'wisata_id',
        'waktu_beli',
        'waktu_kunjung',
        'metode_pembayaran',
        'status_pembayaran',
        'kuantitas',
        'total_harga',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tempatWisata()
    {
        return $this->belongsTo(Wisata::class, 'wisata_id');
    }
}
