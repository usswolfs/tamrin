<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('flight')->latest()->paginate(10);
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $flights = Flight::whereIn('status', ['scheduled', 'in_progress'])->orderBy('departure_at')->get();
        return view('reservations.create', compact('flights'));
    }

    public function store(Request $request)
    {
        Reservation::create($this->validated($request));
        return redirect()->route('reservations.index')->with('success', 'رزرو ثبت شد.');
    }

    public function edit(Reservation $reservation)
    {
        $flights = Flight::orderBy('departure_at')->get();
        return view('reservations.edit', compact('reservation', 'flights'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $reservation->update($this->validated($request, $reservation));
        return redirect()->route('reservations.index')->with('success', 'رزرو ویرایش شد.');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'رزرو حذف شد.');
    }

    private function validated(Request $request, ?Reservation $reservation = null): array
    {
        $uniqueSeat = Rule::unique('reservations', 'seat_number')
            ->where(fn ($query) => $query->where('flight_id', $request->input('flight_id')));
        if ($reservation) $uniqueSeat->ignore($reservation->id);

        return $request->validate([
            'passenger_name' => ['required', 'string', 'max:120'],
            'passenger_email' => ['nullable', 'email', 'max:150'],
            'seat_number' => ['required', 'string', 'max:10', $uniqueSeat],
            'flight_id' => ['required', 'exists:flights,id'],
            'status' => ['required', Rule::in(['confirmed', 'pending', 'cancelled'])],
        ]);
    }
}
