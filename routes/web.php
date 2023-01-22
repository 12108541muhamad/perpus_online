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

// logout
Route::get('/logout', [WikbookController::class, 'logout'])->name('logout');


// Login
Route::middleware('isLogin')->group(function () {
    // 
});


// Admin
Route::middleware('isLogin', 'cekRole:admin')->group(function () {
    Route::get('/dashboard', [WikbookController::class, 'dashboard'])->name('dashboard');
    // Book route
    Route::get('/dashboard/book', [WikbookController::class, 'book'])->name('book');
    Route::get('/createBook', [WikbookController::class, 'createBook'])->name('createBook');
    Route::post('/dashboard/book', [WikbookController::class, 'create'])->name('book.createBook');
    Route::post('/store', [WikbookController::class, 'store'])->name('store');
    Route::get('/dashboard/book/edit/{id}', [WikbookController::class, 'editBook'])->name('editBook'); 
    Route::patch('/dashboard/book/edit/{id}', [WikbookController::class, 'updateBook'])->name('updateBook');
    Route::delete('/dashboard/book/destroy/{id}', [WikbookController::class, 'destroyBook'])->name('destroyBook');
    // Category route
    Route::get('/dashboard/category', [WikbookController::class, 'categories'])->name('categories');
    Route::post('/dashboard/category', [WikbookController::class, 'categoriesCreate'])->name('categoriesCreate');
    Route::get('/dashboard/category/edit/{id}', [WikbookController::class, 'editCategory'])->name('editCategory'); 
    Route::patch('/dashboard/category/edit/{id}', [WikbookController::class, 'updateCategory'])->name('updateCategory');
    Route::delete('/dashboard/category/destroy/{id}', [WikbookController::class, 'destroyCategory'])->name('destroyCategory');
    // User route
    Route::get('/dashboard/accounts/edit/{id}', [WikbookController::class, 'editUser'])->name('editUser'); 
    Route::patch('/dashboard/accounts/edit/{id}', [WikbookController::class, 'updateUser'])->name('updateUser');
    Route::get('/dashboard/accounts', [WikbookController::class, 'users'])->name('accounts');
    Route::delete('/dashboard/user/destroy/{id}', [WikbookController::class, 'destroyUser'])->name('destroyUser');
});

// Admin dan User
Route::middleware('isLogin', 'cekRole:user,admin')->group(function () {
    // 
});

// User
Route::middleware('isLogin', 'cekRole:user')->group(function () {
    // 
});