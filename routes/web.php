<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::any('/loginpage', [App\Http\Controllers\UserController::class, 'loginpage'])->name('loginpage');
Route::any('/registerpage', [App\Http\Controllers\UserController::class, 'registerpage'])->name('registerpage');
Route::any('/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate'])->name('login');
Route::any('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::any('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// admin
Route::middleware(['is_admin'])->group(function(){

    Route::get('admin/dashboard', [App\Http\Controllers\UserController::class, 'admindashboard'])->name('admin.dashboard');

    // Route::any('/admin/alldocuments', [App\Http\Controllers\DocumentController::class, 'alldocuments'])->name('admin.alldocuments');

    // Route::any('/admin/editdocumentpage', [App\Http\Controllers\DocumentController::class, 'admineditdocumentpage'])->name('admin.editdocumentpage');

});

Route::get('dashboard', [App\Http\Controllers\UserController::class, 'userdashboard'])->name('dashboard');




// defult auth
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
