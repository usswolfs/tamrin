@extends('layout')
@section('content')
    <h2>Add flight</h2>
    <form method="POST" action="{{ route('flights.store') }}">
        @csrf
        <label>Plane</label>
        <select name="plane_id">
            @foreach ($planes as $p)
                <option value="{{ $p->id }}" @selected(old('plane_id') == $p->id)>{{ $p->model }} ({{ $p->reg }})</option>
            @endforeach
        </select>
        <label>From</label>
        <input name="origin" value="{{ old('origin') }}">
        <label>To</label>
        <input name="destination" value="{{ old('destination') }}">
        <label>Departure</label>
        <input type="datetime-local" name="departure" value="{{ old('departure') }}">
        <button>Save</button>
    </form>
@endsection
