<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class SidebarController extends Controller
{
    
    public function showsidebar()
    {
        // Mengambil data user saat ini
        $user = User::findOrFail(auth()->id()); // Menggunakan auth()->id() untuk mengambil id pengguna yang sedang login

        // Mengirim data user ke view 'myaccount'
        return view('sidebar', compact('user'));
    }
    

}
?>