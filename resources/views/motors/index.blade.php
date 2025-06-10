<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Motor</title>
</head>
<body>
    <h1>Daftar Motor</h1>
    <nav>
        <a href="{{ route('homepage') }}">Beranda</a> |
        <a href="{{ route('motors.index') }}">Daftar Motor</a> |
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </nav>
    <ul>
        @foreach($motors as $motor)
            <li>{{ $motor->name }} - {{ $motor->price }} /hari</li>
        @endforeach
    </ul>
</body>
</html>
