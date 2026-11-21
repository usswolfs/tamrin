@extends('layout')
@section('content')
    <h2>Flight Management System</h2>
    <p>By Ali Seyedi</p>
    <p>
        <a class="btn" href="{{ route('planes.index') }}">Manage planes</a>
        <a class="btn" href="{{ route('customers.index') }}">Manage customers</a>
        <a class="btn" href="{{ route('flights.index') }}">Manage flights</a>
        <a class="btn" href="{{ route('portal.login') }}">Customer portal</a>
    </p>
@endsection
