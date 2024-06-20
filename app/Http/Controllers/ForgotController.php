<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ForgotController extends Controller
{
    public function showsforgotpassword()
    {
        return view('forgotpassword'); // Sesuaikan dengan nama view yang Anda gunakan
    }
}