<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;

// Група маршрутів для авторизації
Auth::routes();

// Головний маршрут
Route::get('/', function () {
    return view('welcome');
});

// Група маршрутів для профілів та портфоліо
Route::middleware(['auth'])->group(function () {
    Route::resource('portfolios', PortfolioController::class);
    Route::resource('profiles', ProfileController::class);
    Route::get('/portfolios/{portfolio}/edit', [PortfolioController::class, 'edit'])->name('portfolios.edit');

});

Route::resource('portfolios', PortfolioController::class);
Route::get('portfolios/{portfolio}/qr', [PortfolioController::class, 'qr'])->name('portfolios.qr');
// Додаткові маршрути, якщо потрібно
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/portfolios', [PortfolioController::class, 'index'])->name('portfolios.index');
Route::get('/portfolios/{portfolio}/qr', [PortfolioController::class, 'generateQR'])->name('portfolios.qr');


