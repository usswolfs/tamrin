@extends('layout')
@section('content')
    <h2>Hello {{ $customer->name }}</h2>
    <p>
        <a class="btn" href="{{ route('portal.bookings') }}">My bookings</a>
        <form method="POST" action="{{ route('portal.logout') }}" style="display:inline">@csrf <button class="red">Exit</button></form>
    </p>
    <table>
        <tr><th>Route</th><th>Departure</th><th>Free seats</th><th></th></tr>
        @forelse ($flights as $f)
            <tr>
                <td>{{ $f->origin }} → {{ $f->destination }}</td>
                <td>{{ $f->departure->format('Y-m-d H:i') }}</td>
                <td>{{ $f->freeSeats() }}</td>
                <td>
                    <form method="POST" action="{{ route('portal.book', $f) }}">
                        @csrf
                        <button>Book</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4">No flights available</td></tr>
        @endforelse
    </table>
@endsection
