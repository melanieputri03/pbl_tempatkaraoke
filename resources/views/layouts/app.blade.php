<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>
    
    <link rel="stylesheet" href="{{ asset('styles/style_windy.css') }}">
    <link rel="stylesheet" href="https://cdn.tailwindcss.com/3.4.1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">My App</a>
        </div>
    </nav>
    <div class="bg-blue-100 p-4 m-4">
        <p class="text-gray-700">Ini contoh dengan Tailwind</p>
    </div>
    <div class="container mt-4">
        @yield('content')
    </div>
</body>
<script src="/styles/tailwindcss3.4.1.js"></script>
</html>
