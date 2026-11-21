@extends('layouts.app')
@section('title', 'ویرایش هواپیما')
@section('content')
<div class="page-head"><h1>ویرایش هواپیما</h1></div>
<div class="card"><form method="POST" action="{{ route('aircraft.update', $aircraft) }}">@csrf @method('PUT') @include('aircraft._form')</form></div>
@endsection
