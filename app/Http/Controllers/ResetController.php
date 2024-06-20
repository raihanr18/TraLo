<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ResetController extends Controller
{
    public function showsresetPassword()
    {
        return view('resetPassword'); // Sesuaikan dengan nama view yang Anda gunakan
    }
}