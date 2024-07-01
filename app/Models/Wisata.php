<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    protected $table = 'wisata';
    protected $primaryKey = 'id_wisata';

    protected $fillable = [
        'nama_wisata',
        'alamat_wisata',
        'deskripsi_wisata',
        'harga_wisata',
        'gambar_wisata',
    ];

    public function pesanTikets()
    {
        return $this->hasMany(PesanTiket::class, 'id_wisata');
    }
}
