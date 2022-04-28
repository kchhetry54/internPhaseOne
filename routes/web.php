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

//login And Register
Route::get('/login',[\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('/register',[\App\Http\Controllers\AuthController::class, 'register'])->name('register');
Route::post('/register',[\App\Http\Controllers\AuthController::class, 'store'])->name('store');
Route::post('/login',[\App\Http\Controllers\AuthController::class, 'loginuser'])->name('loginuser');
Route::get('/dashboard',[\App\Http\Controllers\AuthController::class,'dashboard'])->name('dashboard')->middleware('isLoggedIn');
Route::get('/users',[\App\Http\Controllers\AuthController::class, 'index'])->name('index')->middleware('IsVerifyEmail');
Route::get('/logout',[\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::get('/updatepassword',[\App\Http\Controllers\AuthController::class, 'updatepassword'])->name('updatepassword')->middleware('isLoggedIn');
Route::get('/changepassword',[\App\Http\Controllers\AuthController::class, 'changepassword'])->name('changepassword')->middleware('isLoggedIn');




// Users
Route::resource('users',\App\Http\Controllers\UserController::class);
Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify');
// Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware(['isLoggedIn', 'is_verify_email']); 

