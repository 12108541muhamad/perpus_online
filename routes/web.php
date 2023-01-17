<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WikbookController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });

Route::middleware('isGuest')->group(function () {
    Route::get('/login', [WikbookController::class, 'login'])->name('login');
    Route::post('/login', [WikbookController::class, 'auth'])->name('login.auth');
    Route::get('/register', [WikbookController::class, 'register'])->name('register');
    Route::post('/register', [WikbookController::class, 'registerAccount'])->name('register.createAccount');
});

// All Access
Route::get('/', [WikbookController::class, 'index'])->name('user');

// logout
Route::get('/logout', [WikbookController::class, 'logout'])->name('logout');


// Admin
Route::middleware('isLogin', 'cekRole:admin')->group(function () {
    Route::get('/admin', [WikbookController::class, 'dashboard'])->name('dashboard');
});

// Admin dan User
Route::middleware('isLogin', 'isGuest', 'cekRole:user,admin')->group(function () {

});

// User
Route::middleware('isLogin', 'cekRole:user')->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user');
});