@extends('layout')
@section('content')
    <h2>{{ $customer->exists ? 'Edit customer' : 'Add customer' }}</h2>
    <form method="POST" action="{{ $customer->exists ? route('customers.update', $customer) : route('customers.store') }}">
        @csrf
        @if ($customer->exists) @method('PUT') @endif
        <label>Full name</label>
        <input name="name" value="{{ old('name', $customer->name) }}">
        <label>Phone</label>
        <input name="phone" value="{{ old('phone', $customer->phone) }}">
        <button>Save</button>
    </form>
@endsection
