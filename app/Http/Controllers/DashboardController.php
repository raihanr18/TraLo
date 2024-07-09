<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use App\Models\User;

class DashboardController extends Controller
{
    public function showdashboard()
    {
        $user = User::findOrFail(auth()->id());
        $wisatas = Wisata::all();
        return view('dashboard', compact('user', 'wisatas'));
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
