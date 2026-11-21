@extends('layouts.app')
@section('title', 'مدیریت رزروها')
@section('content')
<div class="page-head"><h1>مدیریت رزروها</h1><a class="btn" href="{{ route('reservations.create') }}">+ رزرو جدید</a></div>
<div class="card"><div class="table-wrap"><table><thead><tr><th>مسافر</th><th>ایمیل</th><th>شماره صندلی</th><th>شماره پرواز</th><th>وضعیت</th><th>عملیات</th></tr></thead><tbody>
@forelse(reservations as $item)
<tr><td>{{ $item->passenger_name }}</td><td>{{ $item->passenger_email ?: "—" }}</td><td>{{ $item->seat_number }}</td><td>{{ $item->flight->flight_number }}</td><td>{{ ['confirmed'=>'تأییدشده','pending'=>'در انتظار','cancelled'=>'لغوشده'][$item->status] ?? $item->status }}</td><td><div class="actions"><a class="btn secondary" href="{{ route('reservations.edit', $item) }}">ویرایش</a><form method="POST" action="{{ route('reservations.destroy', $item) }}" onsubmit="return confirm('از حذف این مورد مطمئن هستید؟')">@csrf @method('DELETE')<button class="btn danger" type="submit">حذف</button></form></div></td></tr>
@empty<tr><td colspan="6" class="empty">موردی ثبت نشده است.</td></tr>@endforelse
</tbody></table></div><div class="pagination">{{ reservations->links() }}</div></div>
@endsection
