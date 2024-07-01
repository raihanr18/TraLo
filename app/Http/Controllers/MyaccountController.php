<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class MyaccountController extends Controller
{
    
    public function showmyaccount()
    {
        // Mengambil data user saat ini
        $user = User::findOrFail(auth()->id()); // Menggunakan auth()->id() untuk mengambil id pengguna yang sedang login

        // Mengirim data user ke view 'myaccount'
        return view('myaccount', compact('user'));
    }
    

}
?>