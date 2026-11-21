@extends('layouts.app')
@section('title', 'ویرایش رزرو')
@section('content')
<div class="page-head"><h1>ویرایش رزرو</h1></div>
<div class="card"><form method="POST" action="{{ route('reservations.update', $reservation) }}">@csrf @method('PUT') @include('reservations._form')</form></div>
@endsection
