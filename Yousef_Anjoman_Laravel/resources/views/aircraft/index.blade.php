@extends('layouts.app')
@section('title', 'مدیریت هواپیماها')
@section('content')
<div class="page-head"><h1>مدیریت هواپیماها</h1><a class="btn" href="{{ route('aircraft.create') }}">+ هواپیمای جدید</a></div>
<div class="card"><div class="table-wrap"><table><thead><tr><th>شماره ثبت</th><th>سازنده</th><th>مدل</th><th>ظرفیت</th><th>وضعیت</th><th>عملیات</th></tr></thead><tbody>
@forelse(aircraft as $item)
<tr><td>{{ $item->registration_number }}</td><td>{{ $item->manufacturer }}</td><td>{{ $item->model }}</td><td>{{ $item->capacity }} نفر</td><td>{{ ['active'=>'فعال','maintenance'=>'در تعمیر','inactive'=>'غیرفعال'][$item->status] ?? $item->status }}</td><td><div class="actions"><a class="btn secondary" href="{{ route('aircraft.edit', $item) }}">ویرایش</a><form method="POST" action="{{ route('aircraft.destroy', $item) }}" onsubmit="return confirm('از حذف این مورد مطمئن هستید؟')">@csrf @method('DELETE')<button class="btn danger" type="submit">حذف</button></form></div></td></tr>
@empty<tr><td colspan="6" class="empty">موردی ثبت نشده است.</td></tr>@endforelse
</tbody></table></div><div class="pagination">{{ aircraft->links() }}</div></div>
@endsection
