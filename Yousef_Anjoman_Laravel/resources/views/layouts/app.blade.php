<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'مدیریت ناوگان هواپیمایی')</title>
    <style>
        :root{--navy:#14213d;--blue:#2563eb;--bg:#f3f6fb;--ink:#172033;--muted:#6b7280;--line:#e5eaf2}
        *{box-sizing:border-box}body{margin:0;background:var(--bg);color:var(--ink);font-family:Tahoma,Arial,sans-serif;font-size:14px}
        header{background:var(--navy);color:#fff;padding:18px max(calc((100% - 1150px)/2),20px);display:flex;align-items:center;justify-content:space-between;gap:15px;flex-wrap:wrap}
        header strong{font-size:18px}nav{display:flex;gap:8px;flex-wrap:wrap}nav a{color:#e8eefc;text-decoration:none;padding:9px 12px;border-radius:8px}nav a:hover{background:#ffffff20}
        main{max-width:1150px;margin:28px auto;padding:0 18px}.page-head{display:flex;align-items:center;justify-content:space-between;gap:12px;flex-wrap:wrap;margin-bottom:20px}
        h1{font-size:22px;margin:0}h2{font-size:17px;margin:0 0 15px}.muted{color:var(--muted)}.card{background:white;border:1px solid var(--line);border-radius:14px;padding:20px;box-shadow:0 4px 15px #17203308;margin-bottom:18px}
        .stats{display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:15px;margin-bottom:20px}.stat{background:white;border:1px solid var(--line);border-radius:14px;padding:20px}.stat span{color:var(--muted)}.stat b{display:block;font-size:28px;margin-top:10px;color:var(--navy)}
        .btn{display:inline-block;border:0;border-radius:8px;background:var(--blue);color:white;padding:10px 15px;text-decoration:none;cursor:pointer;font-family:inherit;font-size:13px}.btn.secondary{background:#e9eef8;color:var(--navy)}.btn.danger{background:#dc2626}.actions{display:flex;gap:6px;align-items:center;flex-wrap:wrap}
        table{width:100%;border-collapse:collapse}th,td{text-align:right;padding:13px 10px;border-bottom:1px solid var(--line);vertical-align:middle}th{background:#f8faff;color:#4b5563;font-weight:600}tr:last-child td{border-bottom:0}.table-wrap{overflow-x:auto}
        label{display:block;font-weight:600;margin:14px 0 7px}input,select{width:100%;padding:11px;border:1px solid #d6dce7;border-radius:8px;font:inherit;background:#fff}input:focus,select:focus{outline:2px solid #bfdbfe;border-color:var(--blue)}.form-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(230px,1fr));gap:0 18px}.form-actions{display:flex;gap:8px;margin-top:22px}
        .alert{padding:13px 16px;border-radius:9px;margin-bottom:15px}.success{background:#dcfce7;color:#166534}.error{background:#fee2e2;color:#991b1b}.field-error{color:#b91c1c;font-size:12px;margin-top:5px}.badge{display:inline-block;padding:5px 9px;border-radius:20px;background:#e8eefc;color:#1d4ed8;font-size:12px}
        footer{text-align:center;color:#7b8494;padding:20px;margin-top:25px;font-size:12px}.empty{text-align:center;padding:28px;color:var(--muted)}.pagination{margin-top:15px}
        @media(max-width:600px){header{padding:16px}main{margin-top:18px}.card{padding:13px}th,td{white-space:nowrap}}
    </style>
</head>
<body>
<header>
    <strong>✈ سامانه مدیریت ناوگان هواپیمایی</strong>
    <nav>
        <a href="{{ route('dashboard') }}">داشبورد</a>
        <a href="{{ route('aircraft.index') }}">هواپیماها</a>
        <a href="{{ route('flights.index') }}">پروازها</a>
        <a href="{{ route('reservations.index') }}">رزروها</a>
    </nav>
</header>
<main>
    @if(session('success')) <div class="alert success">{{ session('success') }}</div> @endif
    @if(session('error')) <div class="alert error">{{ session('error') }}</div> @endif
    @yield('content')
</main>
<footer>پروژه درس پایگاه داده و برنامه‌نویسی وب | تهیه‌کننده: یوسف انجمن</footer>
</body>
</html>
