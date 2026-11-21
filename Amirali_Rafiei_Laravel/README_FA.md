# پروژه امیرعلی رافعی — مدیریت پرواز — بسته فایل‌های Laravel و PHP

این ZIP شامل فایل‌های برنامه است، نه خود فریم‌ورک Laravel و پوشه vendor.

## راه‌اندازی
1. نصب PHP 8.2+، Composer و MySQL.
2. ساخت پروژه: `composer create-project laravel/laravel app-name`
3. در پوشه پروژه اجرا کنید: `php artisan install:api` (اگر دستور در نسخه شما موجود نبود، `composer require laravel/sanctum` و راهنمای Sanctum همان نسخه را اجرا کنید).
4. فایل‌های این بسته را با حفظ مسیرها در پروژه Laravel کپی و فایل‌های هم‌نام را جایگزین کنید.
5. دیتابیس را در MySQL بسازید و تنظیمات DB در `.env` را وارد کنید.
6. اجرا: `php artisan migrate` سپس `php artisan serve`.
7. نشانی پایه API: `http://127.0.0.1:8000/api`

## تست با Postman
درخواست‌ها را با هدر `Accept: application/json` ارسال کنید. برای POST/PUT از Body → raw → JSON استفاده کنید.

## APIها
- `GET|POST /aircraft` و `GET|PUT|DELETE /aircraft/{id}`
- `GET|POST /pilots` و `GET|PUT|DELETE /pilots/{id}`
- `GET|POST /flights` و `GET|PUT|DELETE /flights/{id}`
- `GET /flights?q=تهران` جست‌وجو بر اساس کد، مبدأ یا مقصد
- `GET /dashboard` آمار کلی و آخرین پروازها

فیلدهای هواپیما: `model,registration,capacity,manufacturer`. خلبان: `full_name,license_no,phone,experience`. پرواز: `flight_code,origin,destination,departure,arrival,aircraft_id,pilot_id,status`. تاریخ‌ها با قالب `2026-12-01 10:30:00` ارسال شوند. حذف هواپیما/خلبان دارای پرواز با پاسخ 409 رد می‌شود.

**یادآوری:** این پروژه‌ها برای تمرین آموزشی هستند؛ پیش از استفاده واقعی، تست امنیتی و پیکربندی production لازم است.
