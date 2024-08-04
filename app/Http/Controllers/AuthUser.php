<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;



class AuthUser extends Controller
{
    // User Controller; Login, Register, Logout

    // Login User
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Jika validasi gagal, kembali dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user, $request->filled('remember'));
                return redirect()->intended(route('dashboard'));
            } else {
                return redirect()->back()->withErrors(['password' => 'Password does not match'])->withInput();
            }
        } else {
            return redirect()->back()->withErrors(['email' => 'Email does not exist'])->withInput();
        }
    }
    // 


    // Register user
    public function showSignupForm()
    {
        return view('auth.register');
    }

    public function signup(Request $request)
{
    $validator = Validator::make($request->all(), [
        'fullname' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ], [
        'email.unique' => 'Email sudah digunakan oleh pengguna lain.',
        'password.min' => 'Password minimal harus 8 karakter.',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $otp = rand(100000, 999999);

    // Simpan data pengguna dan OTP ke database
    $user = User::create([
        'name' => $request->fullname,
        'foto' => 'default.jpg',
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'member',
        'otp' => $otp, // Menyimpan OTP
        'email_verified_at' => null, // OTP dikirimkan, verifikasi email belum selesai
    ]);

    // Kirimkan OTP ke email pengguna
    Mail::send('auth.verification', ['otp' => $otp], function($message) use ($request) {
        $message->to($request->email);
        $message->subject('Email Verification');
    });

    // Arahkan ke halaman verifikasi OTP
    return redirect()->route('verification.form');
}

    // 

    // Verifikasi kode OTP
    public function showVerificationForm()
    {
        // Halaman verifikasi OTP
        return view('auth.verifsignup');
    }

    public function verify(Request $request){
        $request->validate([
            'token' => 'required',
        ]);

        $user = User::where('otp', $request->token)->first();

        if (!$user) {
            return redirect()->route('signup.form')->withErrors(['token' => 'Invalid OTP']);
        }

        // Update status verifikasi email dan hapus OTP
        $user->update([
            'email_verified_at' => now(),
            'otp' => null, // Hapus OTP setelah verifikasi berhasil
        ]);

        Auth::login($user);

        return redirect()->route('login')->with('success', 'Verifikasi Email Anda Berhasil. Silahkan Login.');
    }

    // app/Http/Controllers/AuthController.php
    // public function resendOtp(Request $request){
    //     $user = Auth::user(); // Asumsikan pengguna sudah login atau Anda dapat mengidentifikasi pengguna berdasarkan email

    //     if (!$user) {
    //         return redirect()->back()->withErrors(['message' => 'User not authenticated']);
    //     }

    //     $otp = rand(100000, 999999);
    //     $user->update(['otp' => $otp]);

    //     Mail::send('auth.verification', ['otp' => $otp], function($message) use ($user) {
    //         $message->to($user->email);
    //         $message->subject('Email Verification');
    //     });

    //     return redirect()->route('verification.form')->with('status', 'Kode verifikasi baru telah dikirimkan ke email Anda.');
    // }


    // 

    // Forget password

    // 

    // Logout user
    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('message', 'Anda telah logout');
    }

    // 

    // User Profile Page

    //

    public function showProfile()
    {
    // Ambil pengguna yang saat ini masuk
    $user = auth()->user();

    return view('menu.akun', compact('user'));
    }

    public function updateProfile(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'password' => 'nullable|string|min:8|confirmed',
        'phone' => 'nullable|string|max:15',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $user = auth()->user();
    $user->name = $request->input('name');
    $user->email = $request->input('email');

    if ($request->filled('password')) {
        $user->password = bcrypt($request->input('password'));
    }

    if ($request->hasFile('foto')) {
        // Hapus foto lama jika ada
        if ($user->foto) {
            Storage::delete($user->foto);
        }
        // Simpan foto baru
        $path = $request->file('foto')->store('public/foto_user');
        $user->foto = $path;
    }

    /** @var \App\Models\User $user **/
    $user->phone = $request->input('phone');
    $user->save();

    return redirect()->route('profile.page')->with('success', 'Ubah Profil Berhasil');
}





}