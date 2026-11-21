<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Plane;
use Illuminate\Http\Request;

// Ali Seyedi - flights (admin side)
class FlightController extends Controller
{
    public function index()
    {
        $flights = Flight::with('plane')->orderBy('departure')->get();
        return view('flights.index', compact('flights'));
    }

    public function create()
    {
        $planes = Plane::all();
        return view('flights.create', compact('planes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'plane_id' => 'required|exists:planes,id',
            'origin' => 'required|string|max:100',
            'destination' => 'required|string|max:100|different:origin',
            'departure' => 'required|date',
        ]);
        Flight::create($data);
        return redirect()->route('flights.index')->with('msg', 'Flight added');
    }

    public function destroy(Flight $flight)
    {
        $flight->delete();
        return redirect()->route('flights.index')->with('msg', 'Flight deleted');
    }
}
