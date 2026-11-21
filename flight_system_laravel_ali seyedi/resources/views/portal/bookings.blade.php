@extends('layout')
@section('content')
    <h2>{{ $customer->name }} - my bookings</h2>
    <p><a class="btn" href="{{ route('portal.flights') }}">Back to flights</a></p>
    <table>
        <tr><th>Route</th><th>Departure</th><th></th></tr>
        @forelse ($bookings as $b)
            <tr>
                <td>{{ $b->flight->origin }} → {{ $b->flight->destination }}</td>
                <td>{{ $b->flight->departure->format('Y-m-d H:i') }}</td>
                <td>
                    <form method="POST" action="{{ route('portal.cancel', $b) }}">
                        @csrf @method('DELETE')
                        <button class="red">Cancel</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="3">No bookings</td></tr>
        @endforelse
    </table>
@endsection
