<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    
    public function showdashboard()
    {
        return view('dashboard'); // Sesuaikan dengan nama view yang Anda gunakan
    }
    

}
