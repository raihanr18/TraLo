<?php

namespace App\Http\Controllers;

use App\Models\tiket;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\wisata;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Transaction extends Controller
{
    //

    // Tiket
    public function showTiket(){
        $user = User::findOrFail(auth()->id());
        
        return view('menu.tiket', compact('user'));
    }

    // 

    // Pesanan/Order
    public function showPesanan(){
        $user = User::findOrFail(auth()->id());


        $tikets = Tiket::where('user_id', $user->id)
                    ->where('status_pembayaran', 'belum dibayar')
                    ->with('tempatWisata') // Memuat data wisata terkait dengan metode `tempatWisata`
                    ->get();
    
        // Konversi waktu_kunjung ke Carbon
        foreach ($tikets as $tiket) {
            $tiket->waktu_kunjung = Carbon::parse($tiket->waktu_kunjung);
        }

        return view('menu.order', compact('user', 'tikets'));
    }

    public function batalkanPesanan($id){
        $tiket = Tiket::findOrFail($id);

        if ($tiket->user_id != Auth::id()) {
            return redirect()->route('pesanan')->with('error', 'Unauthorized action.');
        }

        $tiket->delete();

        return redirect()->route('pesanan.page')->with('success', 'Pesanan berhasil dibatalkan.');
    }


    // Menangani melanjutkan pembayaran
    public function lanjutkanPembayaran($id){
        $tiket = Tiket::with('tempatWisata')->findOrFail($id);
        
        // Pastikan hanya pengguna yang membuat tiket yang dapat melanjutkan pembayaran
        if ($tiket->user_id != Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'Unauthorized action.');
        }
    
        // Konversi waktu_kunjung menjadi objek Carbon
        $tiket->waktu_kunjung = Carbon::parse($tiket->waktu_kunjung);
    
        // Arahkan ke halaman pembayaran atau proses lainnya
        return view('menu.transaction.pembayaran', compact('tiket'));
    }



    // 

    public function tambahPesanan(Request $request){
        // Validasi data dari form
        $validated = $request->validate([
            'wisata_id' => 'required|exists:wisatas,id',
            'waktu_kunjung' => 'required|date',
            'kuantitas' => 'required|integer|min:1',
        ]);
    
        // Generate random order number
        $no_pesanan = 'TRL' . Str::random(6);
    
        // Simpan data tiket ke database
        $tiket = new Tiket();
        $tiket->no_pesanan = $no_pesanan;
        $tiket->user_id = auth()->id(); // ID pengguna yang sedang login
        $tiket->wisata_id = $validated['wisata_id'];
        $tiket->waktu_beli = now(); // Waktu pembelian saat ini
        $tiket->waktu_kunjung = $validated['waktu_kunjung'];
        $tiket->metode_pembayaran = null; // Belum diisi, diisi nanti
        $tiket->status_pembayaran = 'belum dibayar'; // Default enum
        $tiket->kuantitas = $validated['kuantitas'];
        $tiket->total_harga = $validated['kuantitas'] * $this->getHargaTiket($validated['wisata_id']); // Hitung total harga tiket
    
        $tiket->save(); // Simpan ke database
    
        // Redirect atau beri pesan sukses
        return redirect()->route('dashboard', ['id' => $validated['wisata_id']])
                         ->with('success', 'Pesanan tiket berhasil dibuat!');
    }

    private function getHargaTiket($wisataId){
        // Ambil harga tiket dari database berdasarkan wisata_id
        $wisata = Wisata::findOrFail($wisataId);
        return $wisata->harga;
    }
    // 


}
