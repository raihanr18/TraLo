<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PesanTiket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class MyorderController extends Controller
{
    public function showmyorder()
    {
        $user = User::findOrFail(auth()->id());

        $userId = Auth::id();

        $pesanTikets = PesanTiket::where('id_user', $userId)
            ->where('status_pembayaran', 'proses')
            ->get();

        return view('myorder', compact('pesanTikets','user'));
    }

    public function batalkanPemesanan(Request $request, $id)
    {
        $pesanTiket = PesanTiket::where('id_pesan', $id)->firstOrFail();

        $pesanTiket->status_pembayaran = 'dibatalkan';
        $pesanTiket->save();

        return redirect()->back()->with('success', 'Pemesanan telah dibatalkan.');
    }
}
