<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesanTiket extends Model
{
    use HasFactory;
    protected $table = 'pesan_tiket';
    protected $primaryKey = 'id_pesan';

    protected $fillable = [
        'id_pesan',
        'id_user',
        'id_wisata',
        'tanggal_kunjungan',
        'jumlah_tiket',
        'harga_total',
        'metode_pembayaran',
        'status_pembayaran',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function wisata()
    {
        return $this->belongsTo(Wisata::class, 'id_wisata');
    }
}
