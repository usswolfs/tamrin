@extends('layout')
@section('content')
    <h2>Customer portal</h2>
    @if ($customers->isEmpty())
        <p>No customers yet. Ask the admin to add one.</p>
    @else
        <form method="POST" action="{{ route('portal.doLogin') }}">
            @csrf
            <label>Who are you?</label>
            <select name="customer_id">
                @foreach ($customers as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
            </select>
            <button>Enter</button>
        </form>
    @endif
@endsection
