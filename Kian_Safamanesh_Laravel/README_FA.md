# پروژه کیان صفامنش — مدیریت کاربران و آیتم‌ها — بسته فایل‌های Laravel و PHP

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

## مسیرهای اصلی
- `POST /register` بدنه: `username,password`
- `POST /login` بدنه: `username,password`
- `GET /me` و `POST /logout` با Bearer Token
- `GET|POST /items`، `GET|PUT|DELETE /items/{id}`
- مدیر: `GET /admin/users`، `PATCH /admin/users/{id}/role` بدنه `role=admin|user`، `DELETE /admin/users/{id}`

پس از ورود، توکن را در Postman در Authorization → Bearer Token قرار دهید. برای فایل پیوست از form-data با کلید `attachment` استفاده کنید. اجرای `php artisan storage:link` برای دسترسی به فایل‌ها پیشنهاد می‌شود.

برای کاربر مدیر اولیه، پس از migrate یک کاربر بسازید و نقش او را در دیتابیس به `admin` تغییر دهید؛ رمز پیش‌فرض ناامن عمداً ایجاد نشده است.

**یادآوری:** این پروژه‌ها برای تمرین آموزشی هستند؛ پیش از استفاده واقعی، تست امنیتی و پیکربندی production لازم است.
