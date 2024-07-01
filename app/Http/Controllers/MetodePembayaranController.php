<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PesanTiket;
use Illuminate\Http\Request;

class MetodePembayaranController extends Controller
{
    
    public function showmetodepembayaran($id_pesan)
    {
        $pesantiket = PesanTiket::with('user')->findOrFail($id_pesan);
        return view('metodepembayaran', compact('pesantiket'));
    }
    public function bayar(Request $request, $id_pesan)
    {
        $pesantiket = PesanTiket::findOrFail($id_pesan);
        $pesantiket->metode_pembayaran = $request->input('payment');
        $pesantiket->status_pembayaran = 'dibayar';
        $pesantiket->save();

        return redirect()->route('myticket')->with('success', 'Pembayaran berhasil dilakukan.');
    }
}
?>