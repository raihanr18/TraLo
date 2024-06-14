<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/signup', [LoginController::class, 'showsignup'])->name('signup');
Route::post('/signup', [LoginController::class, 'signup']);

Route::get('/forgotpassword', [LoginController::class, 'showsforgotpassword'])->name('forgotpassword');
Route::post('/forgotpassword', [LoginController::class, 'forgotpassword']);

Route::get('/resetPassword', [LoginController::class, 'showsresetPassword'])->name('resetPassword');
Route::post('/resetPassword', [LoginController::class, 'showsresetPassword'])->name('resetPassword');