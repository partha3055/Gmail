<?php

use App\Http\Controllers\EmailController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [UserController::class, 'home']);
//Route::view('/register', 'user.register');
//Route::view('/login', 'user.login')->name('login');
Route::any('/register', [UserController::class, 'register'])->name('user-register');
Route::any('/login', [UserController::class, 'login'])->name('user-login');
Route::any('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
Route::any('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('send-email', [EmailController::class, 'sendEmail']);
Route::get('email-form', [EmailController::class, 'emailForm']);
Route::post('send-attach', [EmailController::class, 'sendContactEmail'])->name('attach');
