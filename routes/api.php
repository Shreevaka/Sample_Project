<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [App\Http\Controllers\AuthenticationController::class, 'register']);
Route::post('/login', [App\Http\Controllers\AuthenticationController::class, 'login']);
// Route::get('/login', [App\Http\Controllers\AuthenticationController::class, 'login']);

Route::middleware(['auth:api'])->group(function(){

Route::get('/getcompany', [App\Http\Controllers\WebInterfaceController::class, 'getcompany']);
Route::get('/getemployee', [App\Http\Controllers\WebInterfaceController::class, 'getemployee']);
Route::post('/getprofiledata', [App\Http\Controllers\WebInterfaceController::class, 'getprofiledata']);
Route::post('/changepassword', [App\Http\Controllers\WebInterfaceController::class, 'changepassword']);
Route::post('/deletecompany', [App\Http\Controllers\WebInterfaceController::class, 'deletecompany']);
Route::post('/logout', [App\Http\Controllers\WebInterfaceController::class, 'logout']);

});