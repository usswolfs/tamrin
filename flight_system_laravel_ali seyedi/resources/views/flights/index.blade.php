@extends('layout')
@section('content')
    <h2>Flights</h2>
    <p><a class="btn" href="{{ route('flights.create') }}">Add flight</a></p>
    <table>
        <tr><th>#</th><th>Route</th><th>Departure</th><th>Plane</th><th>Free seats</th><th></th></tr>
        @forelse ($flights as $f)
            <tr>
                <td>{{ $f->id }}</td>
                <td>{{ $f->origin }} → {{ $f->destination }}</td>
                <td>{{ $f->departure->format('Y-m-d H:i') }}</td>
                <td>{{ $f->plane->model }}</td>
                <td>{{ $f->freeSeats() }}</td>
                <td>
                    <form method="POST" action="{{ route('flights.destroy', $f) }}" onsubmit="return confirm('Delete?')">
                        @csrf @method('DELETE')
                        <button class="red">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="6">No flights yet</td></tr>
        @endforelse
    </table>
@endsection
