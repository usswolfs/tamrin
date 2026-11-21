<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Flight Management System</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f4f6f8; }
        nav { background: #1f3a5f; padding: 12px 20px; }
        nav a { color: white; margin-right: 16px; text-decoration: none; }
        .box { max-width: 900px; margin: 20px auto; background: white; padding: 20px; border-radius: 6px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border-bottom: 1px solid #ddd; padding: 8px; text-align: left; }
        input, select { padding: 6px; margin: 4px 0 10px; width: 100%; box-sizing: border-box; }
        button, .btn { background: #1f3a5f; color: white; border: 0; padding: 7px 14px; border-radius: 4px; cursor: pointer; text-decoration: none; font-size: 14px; }
        .red { background: #b33; }
        .msg { background: #e3f4e3; padding: 8px; margin-bottom: 12px; }
        .err { background: #fbe3e3; padding: 8px; margin-bottom: 12px; }
        footer { text-align: center; color: #888; font-size: 12px; padding: 10px; }
    </style>
</head>
<body>
<nav>
    <a href="/">Home</a>
    <a href="{{ route('planes.index') }}">Planes</a>
    <a href="{{ route('customers.index') }}">Customers</a>
    <a href="{{ route('flights.index') }}">Flights</a>
    <a href="{{ route('portal.login') }}">Customer portal</a>
</nav>
<div class="box">
    @if (session('msg'))
        <div class="msg">{{ session('msg') }}</div>
    @endif
    @if ($errors->any())
        <div class="err">
            @foreach ($errors->all() as $e)
                <div>{{ $e }}</div>
            @endforeach
        </div>
    @endif
    @yield('content')
</div>
<footer>Flight Management System - Ali Seyedi</footer>
</body>
</html>
