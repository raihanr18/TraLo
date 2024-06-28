<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class ResetController extends Controller
{
    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'User not found');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('message', 'Password telah diperbaharui');
    }
}
