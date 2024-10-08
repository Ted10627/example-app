<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackstageFlightController;

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', function () {
        return Inertia::render('Backend/Dashboard');
    })->name('dashboard');
});
Route::get('/fetch-flights',[BackstageFlightController::class, 'fetchFlightData']);