<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\PlaneController;
use App\Http\Controllers\PortalController;
use Illuminate\Support\Facades\Route;

// Flight Management System - Ali Seyedi

Route::get('/', function () {
    return view('home');
});

// admin
Route::resource('planes', PlaneController::class)->except('show');
Route::resource('customers', CustomerController::class)->except('show');
Route::resource('flights', FlightController::class)->only(['index', 'create', 'store', 'destroy']);

// customer portal
Route::get('/portal', [PortalController::class, 'loginForm'])->name('portal.login');
Route::post('/portal/login', [PortalController::class, 'login'])->name('portal.doLogin');
Route::post('/portal/logout', [PortalController::class, 'logout'])->name('portal.logout');
Route::get('/portal/flights', [PortalController::class, 'flights'])->name('portal.flights');
Route::post('/portal/flights/{flight}/book', [PortalController::class, 'book'])->name('portal.book');
Route::get('/portal/bookings', [PortalController::class, 'bookings'])->name('portal.bookings');
Route::delete('/portal/bookings/{booking}', [PortalController::class, 'cancel'])->name('portal.cancel');
