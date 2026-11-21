<?php

namespace App\Http\Controllers;

use App\Models\Aircraft;
use App\Models\Flight;
use App\Models\Reservation;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'aircraft' => Aircraft::count(),
            'flights' => Flight::count(),
            'reservations' => Reservation::count(),
            'scheduled' => Flight::where('status', 'scheduled')->count(),
        ];

        $latestFlights = Flight::with('aircraft')->latest('departure_at')->take(5)->get();

        return view('dashboard', compact('stats', 'latestFlights'));
    }
}
