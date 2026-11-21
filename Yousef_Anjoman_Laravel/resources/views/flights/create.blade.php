@extends('layouts.app')
@section('title', 'ثبت پرواز جدید')
@section('content')
<div class="page-head"><h1>ثبت پرواز جدید</h1></div>
<div class="card"><form method="POST" action="{{ route('flights.store') }}">@csrf @include('flights._form')</form></div>
@endsection
