<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function showSignupForm()
    {
        return view('signup');
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

        // Simpan data sementara di sesi
        session([
            'signup_data' => [
                'name' => $request->fullname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'otp' => $otp,
            ]
        ]);

        Mail::send('verification', ['otp' => $otp], function($message) use ($request) {
            $message->to($request->email);
            $message->subject('Email Verification');
        });

        return redirect()->route('verification.form');
    }

    public function showVerificationForm()
    {
        return view('verifsignup');
    }

    public function verify(Request $request)
{
    $request->validate([
        'token' => 'required',
    ]);

    $signupData = session('signup_data');

    if (!$signupData) {
        return redirect()->route('signup.form')->withErrors(['token' => 'Session expired. Please try signing up again.']);
    }

    if ($signupData['otp'] == $request->token) {
        $user = User::create([
            'name' => $signupData['name'],
            'email' => $signupData['email'],
            'password' => $signupData['password'],
            'email_verified_at' => now(),
        ]);

        session()->forget('signup_data');

        Auth::login($user);

        return redirect()->route('login')->with('success', 'Email verified successfully. Silahkan Login.');
    } else {
        return redirect()->back()->withErrors(['token' => 'Invalid OTP'])->withInput();
    }
}


}
