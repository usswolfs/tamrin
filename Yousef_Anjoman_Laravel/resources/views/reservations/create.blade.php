@extends('layouts.app')
@section('title', 'ثبت رزرو جدید')
@section('content')
<div class="page-head"><h1>ثبت رزرو جدید</h1></div>
<div class="card"><form method="POST" action="{{ route('reservations.store') }}">@csrf @include('reservations._form')</form></div>
@endsection
