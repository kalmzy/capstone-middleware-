<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\language\LanguageController;
use App\Http\Controllers\pages\HomePage;
use App\Http\Controllers\pages\Page2;
use App\Http\Controllers\pages\Page3;
use App\Http\Controllers\ReportArchieve;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\QualityStandardController;

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



Route::redirect(uri:('/'),destination:('login'));
// Main Page Route
// authentication
Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
// routes/web.php
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
  Route::get('/dashboard', function () {
    return view('dashboard');
  })->name('dashboard');
  Route::get('/', [HomePage::class, 'index'])->name('pages-home');
Route::get('/page-2', [Page2::class, 'index'])->name('pages-page-2');
Route::get('/page-3', [Page3::class, 'index'])->name('pages-page-3');
Route::get('/page-3/create', [Page3::class, 'create'])->name('pages-page-3.create');
Route::post('/page-3', [Page3::class, 'store'])->name('pages-page-3.store');
Route::get('/page-4', [ReportArchieve::class, 'index'])->name('pages-page-4');
// locale
Route::get('lang/{locale}', [LanguageController::class, 'swap']);
// pages
Route::resource('tasks', TaskController::class);
Route::get('/api/sales', [Page2::class, 'fetchsale']);
Route::prefix('admin')->group(function () {
  Route::controller(DataController::class)->group(function () {
    Route::get('products/filter', 'index')->name('products.filter');
  });
  Route::controller(ReportController::class)->group(function () {
    Route::get('report', 'index');
    Route::get('report/create/category', 'create');
    Route::get('report/create/product', 'createProduct');
    Route::get('report/create/sale', 'createSale');
    Route::post('report', 'store');
    Route::post('report/product', 'storeProduct');
    Route::post('report/sale', 'storeSale');
  });
});
Route::get('/quality_standard', [QualityStandardController::class, 'index'])->name('quality_standards.index');
Route::get('/quality_standard/create', [QualityStandardController::class, 'create'])->name('quality_standards.create');
Route::post('/quality_standard', [QualityStandardController::class, 'store'])->name('quality_standards.store');
});