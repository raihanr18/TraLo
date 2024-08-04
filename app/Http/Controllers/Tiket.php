<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Tiket extends Controller
{
    //

    public function showTiket(){
        $user = User::findOrFail(auth()->id());
        
        return view('menu.tiket', compact('user'));
    }
}
