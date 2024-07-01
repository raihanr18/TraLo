<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PesanTiket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MyorderController extends Controller
{
    public function showmyorder()
    {
        $userId = Auth::id();

        $pesanTikets = PesanTiket::where('id_user', $userId)
            ->where('status_pembayaran', 'proses')
            ->get();

        return view('myorder', compact('pesanTikets'));
    }

    public function batalkanPemesanan(Request $request, $id)
    {
        $pesanTiket = PesanTiket::where('id_pesan', $id)->firstOrFail();

        $pesanTiket->status_pembayaran = 'dibatalkan';
        $pesanTiket->save();

        return redirect()->back()->with('success', 'Pemesanan telah dibatalkan.');
    }
}
