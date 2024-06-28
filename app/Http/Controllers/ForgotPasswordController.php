<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    public function showsforgotpassword()
    {
        return view('forgotpassword'); // Sesuaikan dengan nama view yang Anda gunakan
    }

    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');

        // Check if the email domain is gmail.com
        if (!str_ends_with($email, '@gmail.com')) {
            return redirect()->back()->with('error', 'Email is not valid. Please use a @gmail.com email address.')->withInput();
        }
        
        // Check if the email exists in the database
        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Email tidak terdaftar.')->withInput();
        }

        $otp = rand(100000, 999999); // Generate a 6-digit OTP

        // Save OTP and email to session
        session(['otp' => $otp, 'otp_email' => $email]);

        // Send OTP via email
        Mail::raw("Your OTP code is: $otp", function ($message) use ($email) {
            $message->to($email)
                    ->subject('Your OTP Code');
        });

        return redirect()->back()->with('message', 'OTP has been sent to your email.')->withInput();
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric',
        ]);

        $otp = $request->input('otp');
        $storedOtp = session('otp');
        $email = session('otp_email');

        if ($otp == $storedOtp) {
            // OTP is correct, redirect to reset password page
            return redirect()->route('resetPassword');
        } else {
            // OTP is incorrect, show error message
            return redirect()->back()->with('error', 'Invalid OTP. Please try again.')->withInput();
        }
    }
}