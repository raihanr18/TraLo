<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('login'); // Sesuaikan dengan nama view yang Anda gunakan
    }

    public function showsignup()
    {
        return view('signup'); // Sesuaikan dengan nama view yang Anda gunakan
    }

    public function showsforgotpassword()
    {
        return view('forgotpassword'); // Sesuaikan dengan nama view yang Anda gunakan
    }
    public function showsresetPassword()
    {
        return view('resetPassword'); // Sesuaikan dengan nama view yang Anda gunakan
    }
    
}
