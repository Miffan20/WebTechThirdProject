<?php

use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('login', [HomeController::class, 'login'])->name('login');
Route::post('login', [HomeController::class, 'doLogin'])->name('doLogin');
Route::get('register', [HomeController::class, 'register'])->name('register');
Route::post('register', [HomeController::class, 'doRegister'])->name('doRegister');
Route::get('logout', [HomeController::class, 'logout'])->name('logout');

Route::prefix('adoptions')->as('adoptions.')->group(function() {
    Route::post('/', [AdoptionController::class, 'store'])->name('store');
    Route::get('mine', [AdoptionController::class, 'mine'])->name('mine');
    Route::get('{adoption}', [AdoptionController::class, 'show'])->name('show');
    Route::post('{adoption}/adopt', [AdoptionController::class, 'adopt'])->name('adopt');
});
