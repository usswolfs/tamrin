<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Flight;
use Illuminate\Http\Request;

// Ali Seyedi - customer side: only a customer can book / cancel
class PortalController extends Controller
{
    private function currentCustomer()
    {
        $id = session('customer_id');
        return $id ? Customer::find($id) : null;
    }

    public function loginForm()
    {
        $customers = Customer::all();
        return view('portal.login', compact('customers'));
    }

    public function login(Request $request)
    {
        $request->validate(['customer_id' => 'required|exists:customers,id']);
        session(['customer_id' => $request->customer_id]);
        return redirect()->route('portal.flights');
    }

    public function logout()
    {
        session()->forget('customer_id');
        return redirect()->route('portal.login');
    }

    public function flights()
    {
        $customer = $this->currentCustomer();
        if (!$customer) {
            return redirect()->route('portal.login');
        }
        $flights = Flight::with('plane')->orderBy('departure')->get();
        return view('portal.flights', compact('flights', 'customer'));
    }

    public function book(Flight $flight)
    {
        $customer = $this->currentCustomer();
        if (!$customer) {
            return redirect()->route('portal.login');
        }
        if (Booking::where('flight_id', $flight->id)->where('customer_id', $customer->id)->exists()) {
            return back()->with('msg', 'You already booked this flight');
        }
        if ($flight->freeSeats() <= 0) {
            return back()->with('msg', 'Flight is full');
        }
        Booking::create(['flight_id' => $flight->id, 'customer_id' => $customer->id]);
        return back()->with('msg', 'Booked!');
    }

    public function bookings()
    {
        $customer = $this->currentCustomer();
        if (!$customer) {
            return redirect()->route('portal.login');
        }
        $bookings = Booking::with('flight')->where('customer_id', $customer->id)->get();
        return view('portal.bookings', compact('bookings', 'customer'));
    }

    public function cancel(Booking $booking)
    {
        $customer = $this->currentCustomer();
        if (!$customer || $booking->customer_id != $customer->id) {
            abort(403);
        }
        $booking->delete();
        return back()->with('msg', 'Booking cancelled');
    }
}
