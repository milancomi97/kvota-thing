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
| FALLBACK (IP / nepoznat domen)
|--------------------------------------------------------------------------
*/
Route::fallback(function () {
    abort(404);
});
