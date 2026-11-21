<?php
use Illuminate\Support\Facades\Route; use App\Http\Controllers\Api\{AircraftController,PilotController,FlightController};
Route::apiResource('aircraft',AircraftController::class); Route::apiResource('pilots',PilotController::class); Route::apiResource('flights',FlightController::class);
Route::get('/dashboard',function(){return response()->json(['aircraft_count'=>\App\Models\Aircraft::count(),'pilot_count'=>\App\Models\Pilot::count(),'flight_count'=>\App\Models\Flight::count(),'latest_flights'=>\App\Models\Flight::with(['aircraft','pilot'])->latest('departure')->take(5)->get()]);});
