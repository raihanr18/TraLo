<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
class RegisterController extends Controller{
    public function showsignup()
    {
        return view('signup'); // Sesuaikan dengan nama view yang Anda gunakan
    }
}