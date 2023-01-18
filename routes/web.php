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
Route::get('/', [WikbookController::class, 'index'])->name('index');
Route::get('/error', [WikbookController::class, 'error'])->name('error');
Route::post('/store', [WikbookController::class, 'store'])->name('store');

// logout
Route::get('/logout', [WikbookController::class, 'logout'])->name('logout');



Route::middleware('isLogin')->group(function () {
    Route::delete('/delete/{id}', [WikbookController::class, 'destroyBook'])->name('delete');
});


// Admin
Route::middleware('isLogin', 'cekRole:admin')->group(function () {
    Route::get('/admin', [WikbookController::class, 'admin'])->name('admin');
    Route::get('/createBook', [WikbookController::class, 'createBook'])->name('createBook');
    Route::get('/book', [WikbookController::class, 'book'])->name('book');
    Route::post('/book', [WikbookController::class, 'create'])->name('book.createBook');
    Route::get('/category', [WikbookController::class, 'categories'])->name('categories');
    Route::post('/category', [WikbookController::class, 'categoriesCreate'])->name('categoriesCreate');
});

// Admin dan User
Route::middleware('isLogin', 'cekRole:user,admin')->group(function () {
    // 
    Route::get('/account', [WikbookController::class, 'users'])->name('users');
});

// User
Route::middleware('isLogin', 'cekRole:user')->group(function () {
});