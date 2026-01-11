<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| SUBDOMAIN ROUTES (milos / teretana)
|--------------------------------------------------------------------------
*/
Route::domain('{site}.codegalerija.rs')->middleware(['web'])->group(function () {

    // Landing / Home
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Auth (login, register...)
    Auth::routes();

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('auth')
        ->name('dashboard');
});


/*
|--------------------------------------------------------------------------
| LOCAL – *.test (Laragon)
|--------------------------------------------------------------------------
*/
Route::domain('{site}.test')->middleware('web')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Auth::routes();

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('auth')
        ->name('dashboard');
});


/*
|--------------------------------------------------------------------------
| LOCAL fallback – bez subdomena (kvota.test)
|--------------------------------------------------------------------------
*/
Route::domain('kvota-thing.test')->middleware('web')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Auth::routes();

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('auth')
        ->name('dashboard');
});


Route::fallback(function () {
    abort(404);
});
