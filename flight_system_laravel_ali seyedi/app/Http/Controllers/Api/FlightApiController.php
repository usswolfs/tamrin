<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Flight;
use Illuminate\Http\Request;

// Ali Seyedi - flights API (+ booking by customer)
class FlightApiController extends Controller
{
    public function index()
    {
        return Flight::with('plane')->orderBy('departure')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'plane_id' => 'required|exists:planes,id',
            'origin' => 'required|string|max:100',
            'destination' => 'required|string|max:100|different:origin',
            'departure' => 'required|date',
        ]);
        return response()->json(Flight::create($data), 201);
    }

    public function show(Flight $flight)
    {
        $flight->load('plane');
        $flight->free_seats = $flight->freeSeats();
        return $flight;
    }

    public function update(Request $request, Flight $flight)
    {
        $data = $request->validate([
            'plane_id' => 'sometimes|exists:planes,id',
            'origin' => 'sometimes|string|max:100',
            'destination' => 'sometimes|string|max:100',
            'departure' => 'sometimes|date',
        ]);
        $flight->update($data);
        return $flight;
    }

    public function destroy(Flight $flight)
    {
        $flight->delete();
        return response()->json(['message' => 'Deleted']);
    }

    // only a customer can book
    public function book(Request $request, Flight $flight)
    {
        $request->validate(['customer_id' => 'required|exists:customers,id']);
        $cid = $request->customer_id;

        if (Booking::where('flight_id', $flight->id)->where('customer_id', $cid)->exists()) {
            return response()->json(['message' => 'Already booked'], 409);
        }
        if ($flight->freeSeats() <= 0) {
            return response()->json(['message' => 'Flight is full'], 409);
        }
        $booking = Booking::create(['flight_id' => $flight->id, 'customer_id' => $cid]);
        return response()->json($booking, 201);
    }
}
