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
    Route::get('/admin', [WikbookController::class, 'admin'])->name('admin');
    // Book route
    Route::get('/admin/book', [WikbookController::class, 'book'])->name('book');
    Route::get('/createBook', [WikbookController::class, 'createBook'])->name('createBook');
    Route::post('/admin/book', [WikbookController::class, 'create'])->name('book.createBook');
    Route::post('/store', [WikbookController::class, 'store'])->name('store');
    Route::get('/admin/book/edit/{id}', [WikbookController::class, 'editBook'])->name('editBook'); 
    Route::patch('/admin/book/edit/{id}', [WikbookController::class, 'updateBook'])->name('updateBook');
    // Category route
    Route::get('/admin/category', [WikbookController::class, 'categories'])->name('categories');
    Route::post('/admin/category', [WikbookController::class, 'categoriesCreate'])->name('categoriesCreate');
    Route::get('/admin/category/edit/{id}', [WikbookController::class, 'editCategory'])->name('editCategory'); 
    Route::patch('/admin/category/edit/{id}', [WikbookController::class, 'updateCategory'])->name('updateCategory');
    // User route
    Route::get('/admin/users/edit/{id}', [WikbookController::class, 'editUser'])->name('editUser'); 
    Route::patch('/admin/users/edit/{id}', [WikbookController::class, 'updateUser'])->name('updateUser');
    Route::get('/admin/accounts', [WikbookController::class, 'users'])->name('accounts');
});

// Admin dan User
Route::middleware('isLogin', 'cekRole:user,admin')->group(function () {
    // 
});

// User
Route::middleware('isLogin', 'cekRole:user')->group(function () {
    // 
});