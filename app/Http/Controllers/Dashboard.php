<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\wisata;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    //
    public function showDashboard(){
        $wisatas = Wisata::all();
        $user = auth()->user();

        return view('menu.dashboard', compact('wisatas', 'user'));
    }

    public function search(Request $request){
        $searchQuery = $request->input('search');

        // Cari di tabel wisata berdasarkan nama
        $results = Wisata::where('nama', 'like', '%' . $searchQuery . '%')->get();

        // Kembalikan hasil pencarian ke view
        return view('menu.search_results', ['results' => $results]);
    }

    public function viewWisata($id){
        $wisata = wisata::findOrFail($id);

        // Generate 5 future dates
        $nextDates = [];
        $today = Carbon::today();
        for ($i = 0; $i < 5; $i++) {
            $nextDates[] = $today->copy()->addDays($i);
        }

        return view('menu.transaction.view_wisata', compact('wisata', 'nextDates'));
    }
}
