<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\language\LanguageController;
use App\Http\Controllers\pages\HomePage;
use App\Http\Controllers\pages\Page2;
use App\Http\Controllers\pages\Page3;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\RegressionController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Main Page Route
Route::get('/', [HomePage::class, 'index'])->name('pages-home');
Route::get('/page-2', [Page2::class, 'index'])->name('pages-page-2');
Route::get('/page-3', [Page3::class, 'index'])->name('pages-page-3');

// locale
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

// pages

// authentication
Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
// routes/web.php

Route::resource('tasks', TaskController::class);
Route::resource('dataCon', DataController::class);
Route::resource('regression', RegressionController::class);
