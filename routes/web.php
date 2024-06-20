<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MyticketController;
use App\Http\Controllers\MyorderController;
use App\Http\Controllers\MyaccountController;


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

Route::get('/signup', [RegisterController::class, 'showsignup'])->name('signup');
Route::post('/signup', [RegisterController::class, 'signup']);

Route::get('/forgotpassword', [ForgotController::class, 'showsforgotpassword'])->name('forgotpassword');
Route::post('/forgotpassword', [ForgotController::class, 'forgotpassword']);

Route::get('/resetPassword', [ResetController::class, 'showsresetPassword'])->name('resetPassword');
Route::post('/resetPassword', [ResetController::class, 'showsresetPassword'])->name('resetPassword');

Route::get('/dashboard', [DashboardController::class, 'showdashboard'])->name('dashboard');
Route::post('/dashboard', [DashboardController::class, 'showdashboard'])->name('dashboard');

Route::get('/myticket', [MyticketController::class, 'showmyticket'])->name('myticket');
Route::post('/myticket', [MyticketController::class, 'showmyticket'])->name('myticket');

Route::get('/myorder', [MyorderController::class, 'showmyorder'])->name('myorder');
Route::post('/myorder', [MyorderController::class, 'showmyorder'])->name('myorder');

Route::get('/myaccount', [MyaccountController::class, 'showmyaccount'])->name('myaccount');
Route::post('/myaccount', [MyaccountController::class, 'showmyaccount'])->name('myaccount');