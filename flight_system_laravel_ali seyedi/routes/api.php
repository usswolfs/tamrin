<?php

use App\Http\Controllers\Api\BookingApiController;
use App\Http\Controllers\Api\CustomerApiController;
use App\Http\Controllers\Api\FlightApiController;
use App\Http\Controllers\Api\PlaneApiController;
use Illuminate\Support\Facades\Route;

// Flight Management System API - Ali Seyedi
// all urls start with /api

Route::apiResource('planes', PlaneApiController::class);
Route::apiResource('customers', CustomerApiController::class);
Route::apiResource('flights', FlightApiController::class);

Route::get('customers/{customer}/bookings', [CustomerApiController::class, 'bookings']);
Route::post('flights/{flight}/book', [FlightApiController::class, 'book']);
Route::delete('bookings/{booking}', [BookingApiController::class, 'destroy']);
