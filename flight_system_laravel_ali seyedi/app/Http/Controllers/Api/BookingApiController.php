<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

// Ali Seyedi - cancel booking (only by its owner)
class BookingApiController extends Controller
{
    public function destroy(Request $request, Booking $booking)
    {
        $request->validate(['customer_id' => 'required|exists:customers,id']);
        if ($booking->customer_id != $request->customer_id) {
            return response()->json(['message' => 'Not your booking'], 403);
        }
        $booking->delete();
        return response()->json(['message' => 'Cancelled']);
    }
}
