<?php

use App\Http\Controllers\FormulaireController;
use App\Http\Controllers\DashboardController;
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

Route::get('/product', function () {
    return view('product');
})->name('product');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/about', function () {
    return view('about');
})->name('about');


Route::get('/getWilaya', [FormulaireController::class, 'getwilaya'])->name('getWilaya');
Route::get('/getCommune/{wilaya_code}', [FormulaireController::class, 'getCommune'])->name('getCommune');
Route::post('/saveOrder', [FormulaireController::class, 'saveOrder'])->name('saveOrder');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/accept-order/{id}', [DashboardController::class, 'accept_order'])->name('accept-order');
    Route::get('/refuse-order/{id}', [DashboardController::class, 'refuse_order'])->name('refuse-order');
    Route::get('/annulled-order/{id}', [DashboardController::class, 'annulled_order'])->name('annulled-order');
});



require __DIR__.'/auth.php';
