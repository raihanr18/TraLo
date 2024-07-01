<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;

class DashboardController extends Controller
{
    public function showdashboard()
    {
        $wisatas = Wisata::all();
        return view('dashboard', compact('wisatas'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        
        $wisatas = Wisata::where('nama_wisata', 'LIKE', "%{$query}%")
            ->orWhere('alamat_wisata', 'LIKE', "%{$query}%")
            ->get();

        return view('dashboard', compact('wisatas'));
    }
}
