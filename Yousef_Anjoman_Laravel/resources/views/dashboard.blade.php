@extends('layouts.app')
@section('title', 'داشبورد | مدیریت ناوگان')
@section('content')
<div class="page-head"><div><h1>داشبورد</h1><p class="muted">نمای کلی اطلاعات سامانه</p></div></div>
<div class="stats">
    <div class="stat"><span>تعداد هواپیماها</span><b>{{ $stats['aircraft'] }}</b></div>
    <div class="stat"><span>کل پروازها</span><b>{{ $stats['flights'] }}</b></div>
    <div class="stat"><span>کل رزروها</span><b>{{ $stats['reservations'] }}</b></div>
    <div class="stat"><span>پروازهای برنامه‌ریزی‌شده</span><b>{{ $stats['scheduled'] }}</b></div>
</div>
<div class="card">
    <div class="page-head"><h2>آخرین پروازها</h2><a class="btn" href="{{ route('flights.create') }}">ثبت پرواز جدید</a></div>
    <div class="table-wrap"><table><thead><tr><th>شماره پرواز</th><th>مبدأ</th><th>مقصد</th><th>هواپیما</th><th>زمان حرکت</th><th>وضعیت</th></tr></thead><tbody>
    @forelse($latestFlights as $flight)
        <tr><td>{{ $flight->flight_number }}</td><td>{{ $flight->origin }}</td><td>{{ $flight->destination }}</td><td>{{ $flight->aircraft->registration_number }}</td><td>{{ $flight->departure_at->format('Y/m/d H:i') }}</td><td><span class="badge">{{ ['scheduled'=>'برنامه‌ریزی‌شده','in_progress'=>'در حال انجام','completed'=>'انجام‌شده','cancelled'=>'لغوشده'][$flight->status] ?? $flight->status }}</span></td></tr>
    @empty
        <tr><td colspan="6" class="empty">هنوز پروازی ثبت نشده است.</td></tr>
    @endforelse
    </tbody></table></div>
</div>
@endsection
