@extends('layouts.app')
@section('title', 'ثبت هواپیما جدید')
@section('content')
<div class="page-head"><h1>ثبت هواپیما جدید</h1></div>
<div class="card"><form method="POST" action="{{ route('aircraft.store') }}">@csrf @include('aircraft._form')</form></div>
@endsection
