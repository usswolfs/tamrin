<div class="form-grid">
<div><label>شماره ثبت هواپیما</label><input name="registration_number" value="{{ old('registration_number', $aircraft->registration_number ?? '') }}" required maxlength="30">@error('registration_number')<div class="field-error">{{ $message }}</div>@enderror</div>
<div><label>سازنده</label><input name="manufacturer" value="{{ old('manufacturer', $aircraft->manufacturer ?? '') }}" required>@error('manufacturer')<div class="field-error">{{ $message }}</div>@enderror</div>
<div><label>مدل هواپیما</label><input name="model" value="{{ old('model', $aircraft->model ?? '') }}" required>@error('model')<div class="field-error">{{ $message }}</div>@enderror</div>
<div><label>ظرفیت مسافر</label><input type="number" name="capacity" min="1" max="1000" value="{{ old('capacity', $aircraft->capacity ?? 150) }}" required>@error('capacity')<div class="field-error">{{ $message }}</div>@enderror</div>
<div><label>وضعیت</label><select name="status" required>@foreach(['active'=>'فعال','maintenance'=>'در تعمیر','inactive'=>'غیرفعال'] as $value=>$label)<option value="{{ $value }}" @selected(old('status', $aircraft->status ?? 'active')===$value)>{{ $label }}</option>@endforeach</select></div>
</div>
<div class="form-actions"><button class="btn" type="submit">ذخیره اطلاعات</button><a class="btn secondary" href="{{ route('aircraft.index') }}">بازگشت</a></div>
