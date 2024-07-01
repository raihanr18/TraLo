<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PesanTiket;
use Illuminate\Support\Facades\Auth;

class MyticketController extends Controller
{
    public function showmyticket()
    {
        $userId = Auth::id();
         
        $pesanTikets = PesanTiket::where('id_user', $userId)
            ->where(function ($query) {
                $query->where('status_pembayaran', 'dibayar')
                      ->orWhere('status_pembayaran', 'dibatalkan');
            })
            ->orderBy('created_at', 'desc') // Menambahkan pengurutan berdasarkan created_at descending
            ->get();

        return view('myticket', compact('pesanTikets'));
    }
}
