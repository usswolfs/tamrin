@extends('layout')
@section('content')
    <h2>{{ $plane->exists ? 'Edit plane' : 'Add plane' }}</h2>
    <form method="POST" action="{{ $plane->exists ? route('planes.update', $plane) : route('planes.store') }}">
        @csrf
        @if ($plane->exists) @method('PUT') @endif
        <label>Model</label>
        <input name="model" value="{{ old('model', $plane->model) }}">
        <label>Registration number</label>
        <input name="reg" value="{{ old('reg', $plane->reg) }}">
        <label>Seats</label>
        <input type="number" name="seats" value="{{ old('seats', $plane->seats) }}">
        <button>Save</button>
    </form>
@endsection
