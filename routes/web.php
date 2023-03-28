<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::middleware('auth')->resource('/demand', App\Http\Controllers\DemandController::class);
Route::middleware('auth')->prefix('/demand')->group(function () {
    Route::get('/open/{demand}', [App\Http\Controllers\DemandController::class, 'open'])->name('demand.open');
    Route::get('/conclude/{demand}', [App\Http\Controllers\DemandController::class, 'conclude'])->name('demand.conclude');
    Route::get('/cancel/{demand}', [App\Http\Controllers\DemandController::class, 'cancel'])->name('demand.cancel');
});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
