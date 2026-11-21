# پروژه یوسف انجمن — مدیریت ناوگان و رزرو — بسته فایل‌های Laravel و PHP

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

این بسته، فایل‌های اصلی وب موجود در ZIP اولیه را حفظ کرده و APIهای JSON را نیز به آن اضافه می‌کند. فایل‌های اصلی Laravel را با حفظ مسیرها کپی کنید.

## مسیرهای API
- `GET /dashboard` آمار هواپیما، پرواز و رزرو
- `GET|POST /aircraft`، `GET|PUT|PATCH|DELETE /aircraft/{id}`
- `GET|POST /flights`، `GET|PUT|PATCH|DELETE /flights/{id}`
- `GET|POST /reservations`، `GET|PUT|PATCH|DELETE /reservations/{id}`

هواپیما: `registration_number,model,manufacturer,capacity,status`. پرواز: `flight_number,origin,destination,departure_at,arrival_at,aircraft_id,status`. رزرو: `passenger_name,passenger_email,seat_number,flight_id,status`. شماره صندلی در هر پرواز یکتا است و ظرفیت هواپیما کنترل می‌شود.

## وب و API
مسیرهای وب و صفحات Blade موجود حفظ شده‌اند؛ مسیرهای JSON در `routes/api.php` قرار دارند. پس از کپی فایل‌ها `php artisan install:api` را اجرا کنید تا Laravel مسیرهای API را ثبت کند.

**یادآوری:** این پروژه‌ها برای تمرین آموزشی هستند؛ پیش از استفاده واقعی، تست امنیتی و پیکربندی production لازم است.
