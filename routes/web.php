<?php

use App\Http\Controllers\Tiket;
use App\Http\Controllers\Transaction;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthUser;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\ResetController;
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

// Welcome Page
Route::get('/', function () {
    return view('index');
})->name('index');

// Authentication Routes
Route::middleware(['guest'])->group(function () {
    // Login
    Route::get('/login', [AuthUser::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthUser::class, 'login'])->name('login.post');
    
    // Register
    Route::get('/signup', [AuthUser::class, 'showSignupForm'])->name('signup.form');
    Route::post('/signup', [AuthUser::class, 'signup'])->name('signup');
    Route::get('/verification', [AuthUser::class, 'showVerificationForm'])->name('verification.form');
    Route::post('/verification-process', [AuthUser::class, 'verify'])->name('verify');

    // Forgot Password
    Route::get('/forgotpassword', [ForgotPasswordController::class, 'showsforgotpassword'])->name('forgotpassword');
    Route::post('/forgotpassword', [ForgotPasswordController::class, 'forgotpassword']);

    // OTP
    Route::post('/send-otp', [ForgotPasswordController::class, 'sendOtp'])->name('sendOtp');
    Route::post('/verify-otp', [ForgotPasswordController::class, 'verifyOtp'])->name('verifyOtp');

    // Search
    Route::get('/search', [Dashboard::class, 'search'])->name('search');
});

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    // Logout
    Route::post('/logout', [AuthUser::class, 'logout'])->name('logout');
    
    // Dashboard
    Route::get('/dashboard', [Dashboard::class, 'showdashboard'])->name('dashboard');

    // Ticket Routes
    Route::get('/tiket', [Transaction::class, 'showTiket'])->name('tiket.page');
    
    // Wisata
    Route::get('/wisata/{id}', [Dashboard::class, 'viewWisata'])->name('view.wisata');
    Route::post('/wisata/pesan', [Transaction::class, 'tambahPesanan'])->name('pesan.wisata');
    

    // Order Routes
    Route::get('/pesanan', [Transaction::class, 'showPesanan'])->name('pesanan.page');
    Route::delete('/pesanan/{id}/batal', [Transaction::class, 'batalkanPesanan'])->name('pesanan.batal');
    Route::post('/pesanan/{id}/pembayaran', [Transaction::class, 'lanjutkanPembayaran'])->name('pesanan.lanjutkan');

    // User Profile
    Route::get('/profile-user', [AuthUser::class, 'showProfile'])->name('profile.page');
    Route::post('/profile-update', [AuthUser::class, 'updateProfile'])->name('profile.update');

    // Reset Password
    Route::get('/reset-password', function () {
        return view('resetpassword'); 
    })->name('showResetPasswordForm');
    Route::post('/reset-password', [ResetController::class, 'resetPassword'])->name('resetPassword');
});

// Testing Route
Route::get('/testing', function(){
    return view('menu.transaction.pembayaran');
});