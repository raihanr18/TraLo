<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class VerifikasiController extends Controller
{
    // Menampilkan form login
    public function showverifsignup()
    {
        return view('verifsignup'); // Sesuaikan dengan nama view yang Anda gunakan
    }
    

}
