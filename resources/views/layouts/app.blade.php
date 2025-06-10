<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    @if (!Request::is('login')) 
        <nav>
            <a href="{{ route('homepage') }}">Beranda</a>
            <a href="{{ route('motors.index') }}">Daftar Motor</a>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </nav>
    @endif

    <div class="container">
        @yield('content')
    </div>

</body>
</html>
