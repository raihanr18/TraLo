<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
    ];

    public function tempatWisata()
    {
        return $this->hasMany(Wisata::class, 'kategori_id');
    }
}
