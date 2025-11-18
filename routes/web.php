<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UserController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Route;

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



Route::get('/', function() {
    return view('landing');
})->name('home');


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');



Route::middleware(['auth']) // ili samo 'auth'
->prefix('analytics')
    ->name('analytics.')
    ->group(function () {
        Route::get('/', [GoogleController::class, 'dashboard'])->name('dashboard');
        Route::get('/daily-users', [GoogleController::class, 'dailyUsers'])->name('daily-users');
        Route::get('/top-pages', [GoogleController::class, 'topPages'])->name('top-pages');
        Route::get('/analytics/ping', [GoogleController::class, 'ping'])
            ->name('ping');
        Route::get('/realtime', [\App\Http\Controllers\GoogleController::class, 'realtime'])->name('realtime');

    });
