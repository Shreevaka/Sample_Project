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

    Route::get('/admin/companies', [App\Http\Controllers\CompanyController::class, 'index'])->name('admin.companies');
    Route::get('/admin/createcompany', [App\Http\Controllers\CompanyController::class, 'create'])->name('admin.createcompany');
    Route::post('/admin/storecompany', [App\Http\Controllers\CompanyController::class, 'store'])->name('admin.storecompany');
    Route::post('/admin/editcompany', [App\Http\Controllers\CompanyController::class, 'edit'])->name('admin.editcompany');
    Route::post('/admin/updatecompany', [App\Http\Controllers\CompanyController::class, 'update'])->name('admin.updatecompany');
    Route::post('/admin/destroycompany', [App\Http\Controllers\CompanyController::class, 'destroy'])->name('admin.destroycompany');

    Route::get('/admin/employees', [App\Http\Controllers\EmployeeController::class, 'index'])->name('admin.employees');
    Route::get('/admin/createemployee', [App\Http\Controllers\EmployeeController::class, 'create'])->name('admin.createemployee');
    Route::post('/admin/storeemployee', [App\Http\Controllers\EmployeeController::class, 'store'])->name('admin.storeemployee');
    Route::post('/admin/editemployee', [App\Http\Controllers\EmployeeController::class, 'edit'])->name('admin.editemployee');
    Route::post('/admin/updateemployee', [App\Http\Controllers\EmployeeController::class, 'update'])->name('admin.updateemployee');
    Route::post('/admin/destroyemployee', [App\Http\Controllers\EmployeeController::class, 'destroy'])->name('admin.destroyemployee');
    

    // Route::any('/admin/editdocumentpage', [App\Http\Controllers\DocumentController::class, 'admineditdocumentpage'])->name('admin.editdocumentpage');

});

Route::get('dashboard', [App\Http\Controllers\UserController::class, 'userdashboard'])->name('dashboard');
Route::get('/companies', [App\Http\Controllers\CompanyController::class, 'index1'])->name('companies');
Route::get('/employees', [App\Http\Controllers\EmployeeController::class, 'index1'])->name('employees');

Route::get('/profile', [App\Http\Controllers\UserController::class, 'index'])->name('profile');
Route::any('/changepassword', [App\Http\Controllers\UserController::class, 'changepassword'])->name('changepassword');





// defult auth
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
