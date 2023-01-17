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

Route::get('/', [WikbookController::class, 'index'])->name('index'); // route menuju landing page
Route::get('/login', [WikbookController::class, 'login'])->name('login');
Route::get('/register', [WikbookController::class, 'register'])->name('register');
Route::post('/register', [WikbookController::class, 'registerAccount'])->name('register.createAccount');
Route::post('/login', [WikbookController::class, 'auth'])->name('login.auth');