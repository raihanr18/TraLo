<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MyticketController;
use App\Http\Controllers\MyorderController;
use App\Http\Controllers\MyaccountController;
use App\Http\Controllers\MembuatPesananController;
use App\Http\Controllers\MetodePembayaranController;
use App\Http\Controllers\ForgotPasswordController;


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

//Welcome
Route::get('/', function () {
    return view('index');
});

//Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

//Register
Route::get('/signup', [RegisterController::class, 'showSignupForm'])->name('signup.form');
Route::post('/signup', [RegisterController::class, 'signup'])->name('signup');
Route::get('/verification', [RegisterController::class, 'showVerificationForm'])->name('verification.form');
Route::post('/verification', [RegisterController::class, 'verify'])->name('verify');



Route::get('/forgotpassword', [ForgotPasswordController::class, 'showsforgotpassword'])->name('forgotpassword');
Route::post('/forgotpassword', [ForgotPasswordController::class, 'forgotpassword']);
Route::post('/send-otp', [ForgotPasswordController::class, 'sendOtp'])->name('sendOtp');
Route::post('/verify-otp', [ForgotPasswordController::class, 'verifyOtp'])->name('verifyOtp');

Route::get('/reset-password', function () {
    return view('resetpassword'); 
})->name('showResetPasswordForm');
Route::post('/reset-password', [ResetController::class, 'resetPassword'])->name('resetPassword');

Route::get('/dashboard', [DashboardController::class, 'showdashboard'])->middleware('auth')->name('dashboard');
Route::post('/dashboard', [DashboardController::class, 'showdashboard'])->name('dashboard');
Route::get('/search', [DashboardController::class, 'search'])->name('search');

Route::get('/myticket', [MyticketController::class, 'showmyticket'])->name('myticket');
Route::post('/myticket', [MyticketController::class, 'showmyticket'])->name('myticket');

Route::get('/myorder', [MyorderController::class, 'showmyorder'])->name('myorder');
Route::put('/myorder/batalkan/{id}', [MyorderController::class, 'batalkanPemesanan'])->name('batalkanPemesanan');

Route::get('/myaccount', [MyaccountController::class, 'showmyaccount'])->name('myaccount');
Route::post('/myaccount', [MyaccountController::class, 'showmyaccount'])->name('myaccount');

Route::get('/membuatpesanan/{id_wisata}', [MembuatPesananController::class, 'showmembuatpesanan'])->name('membuatpesanan');
Route::post('/store-order', [MembuatPesananController::class, 'storeOrder'])->name('store.order');

Route::get('/metodepembayaran/{id_pesan}', [MetodePembayaranController::class, 'showmetodepembayaran'])->name('metodepembayaran');
Route::post('/metodepembayaran/{id_pesan}', [MetodePembayaranController::class, 'showmetodepembayaran'])->name('metodepembayaran');
Route::post('/bayar/{id_pesan}', [MetodePembayaranController::class, 'bayar'])->name('bayar');