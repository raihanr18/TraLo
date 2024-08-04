<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wisata extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'kategori_id', 'nama', 'foto', 'deskripsi', 'lokasi', 'harga','waktu_buka', 'waktu_tutup', 'kontak',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'wisata_id');
    }

    public function tickets()
    {
        return $this->hasMany(Tiket::class, 'wisata_id');
    }
}
