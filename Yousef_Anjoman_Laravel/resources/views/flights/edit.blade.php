@extends('layouts.app')
@section('title', 'ویرایش پرواز')
@section('content')
<div class="page-head"><h1>ویرایش پرواز</h1></div>
<div class="card"><form method="POST" action="{{ route('flights.update', $flight) }}">@csrf @method('PUT') @include('flights._form')</form></div>
@endsection
