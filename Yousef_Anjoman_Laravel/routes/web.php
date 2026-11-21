<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AircraftController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\ReservationController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('aircraft', AircraftController::class)->except(['show']);
Route::resource('flights', FlightController::class)->except(['show']);
Route::resource('reservations', ReservationController::class)->except(['show']);
