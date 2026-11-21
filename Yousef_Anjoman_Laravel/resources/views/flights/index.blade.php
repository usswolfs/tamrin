@extends('layouts.app')
@section('title', 'مدیریت پروازها')
@section('content')
<div class="page-head"><h1>مدیریت پروازها</h1><a class="btn" href="{{ route('flights.create') }}">+ پرواز جدید</a></div>
<div class="card"><div class="table-wrap"><table><thead><tr><th>شماره پرواز</th><th>مبدأ</th><th>مقصد</th><th>هواپیما</th><th>زمان حرکت</th><th>وضعیت</th><th>عملیات</th></tr></thead><tbody>
@forelse(flights as $item)
<tr><td>{{ $item->flight_number }}</td><td>{{ $item->origin }}</td><td>{{ $item->destination }}</td><td>{{ $item->aircraft->registration_number }}</td><td>{{ $item->departure_at->format("Y/m/d H:i") }}</td><td>{{ ['scheduled'=>'برنامه‌ریزی‌شده','in_progress'=>'در حال انجام','completed'=>'انجام‌شده','cancelled'=>'لغوشده'][$item->status] ?? $item->status }}</td><td><div class="actions"><a class="btn secondary" href="{{ route('flights.edit', $item) }}">ویرایش</a><form method="POST" action="{{ route('flights.destroy', $item) }}" onsubmit="return confirm('از حذف این مورد مطمئن هستید؟')">@csrf @method('DELETE')<button class="btn danger" type="submit">حذف</button></form></div></td></tr>
@empty<tr><td colspan="7" class="empty">موردی ثبت نشده است.</td></tr>@endforelse
</tbody></table></div><div class="pagination">{{ flights->links() }}</div></div>
@endsection
