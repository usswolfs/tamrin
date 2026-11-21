<?php

namespace App\Http\Controllers;

use App\Models\Aircraft;
use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FlightController extends Controller
{
    public function index()
    {
        $flights = Flight::with('aircraft')->latest('departure_at')->paginate(10);
        return view('flights.index', compact('flights'));
    }

    public function create()
    {
        $aircraft = Aircraft::where('status', 'active')->orderBy('registration_number')->get();
        return view('flights.create', compact('aircraft'));
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        Flight::create($data);
        return redirect()->route('flights.index')->with('success', 'پرواز ثبت شد.');
    }

    public function edit(Flight $flight)
    {
        $aircraft = Aircraft::orderBy('registration_number')->get();
        return view('flights.edit', compact('flight', 'aircraft'));
    }

    public function update(Request $request, Flight $flight)
    {
        $flight->update($this->validated($request));
        return redirect()->route('flights.index')->with('success', 'اطلاعات پرواز ویرایش شد.');
    }

    public function destroy(Flight $flight)
    {
        if ($flight->reservations()->exists()) {
            return back()->with('error', 'این پرواز رزرو دارد؛ ابتدا رزروهای مرتبط را حذف کنید.');
        }
        $flight->delete();
        return redirect()->route('flights.index')->with('success', 'پرواز حذف شد.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'flight_number' => ['required', 'string', 'max:20'],
            'origin' => ['required', 'string', 'max:100'],
            'destination' => ['required', 'string', 'max:100', 'different:origin'],
            'departure_at' => ['required', 'date'],
            'arrival_at' => ['required', 'date', 'after:departure_at'],
            'aircraft_id' => ['required', 'exists:aircraft,id'],
            'status' => ['required', Rule::in(['scheduled', 'in_progress', 'completed', 'cancelled'])],
        ]);
    }
}
