<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Wisata;
use App\Models\PesanTiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MembuatPesananController extends Controller
{
    public function showmembuatpesanan($id_wisata)
    {
        $wisata = Wisata::findOrFail($id_wisata);
        return view('membuatpesanan', compact('wisata'));
    }

    public function storeOrder(Request $request)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'tanggal_kunjungan' => 'required|date',
            'jumlah_tiket' => 'required|integer|min:1',
        ]);

        // Mengambil data dari request
        $id_wisata = $request->input('id_wisata');
        $id_user = Auth::id();
        $tanggal_kunjungan = $request->input('tanggal_kunjungan');
        $jumlah_tiket = $request->input('jumlah_tiket');
        $harga_wisata = Wisata::findOrFail($id_wisata)->harga_wisata;
        $harga_total = $harga_wisata * $jumlah_tiket;

        // Menyimpan pesanan ke dalam database
        PesanTiket::create([
            'id_user' => $id_user,
            'id_wisata' => $id_wisata,
            'tanggal_kunjungan' => $tanggal_kunjungan,
            'jumlah_tiket' => $jumlah_tiket,
            'harga_total' => $harga_total,
            'metode_pembayaran' => 'belum bayar', // Default metode pembayaran, bisa disesuaikan
            'status_pembayaran' => 'proses', // Status pembayaran default
        ]);

        return redirect()->route('myorder')->with('success', 'Pesanan berhasil dibuat!');
    }
}
