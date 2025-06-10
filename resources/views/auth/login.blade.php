<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SpeedRent</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        body {
            font-family: Arial, sans-serif;
            background: url("{{('images/backround.png') }}") no-repeat center center fixed;
            background-size: cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            position: relative;
        }

        /* Overlay transparan */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(8px);
            z-index: 1;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(15px);
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            width: 350px;
            text-align: center;
            position: relative;
            z-index: 2;
            animation: fadeIn 1s ease-in-out;
        }

        .login-container h1 {
            font-size: 26px;
            font-weight: bold;
            color: white;
            margin-bottom: 8px;
            animation: fadeIn 1s ease-in-out 0.3s;
        }

        .login-container p {
            font-size: 14px;
            color: white;
            margin-bottom: 20px;
            animation: fadeIn 1s ease-in-out 0.5s;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-group {
            text-align: left;
            width: 100%;
            max-width: 280px;
            margin-bottom: 15px;
            animation: fadeIn 1s ease-in-out 0.7s;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: white;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.6);
            color: black;
            font-size: 14px;
            outline: none;
            transition: 0.3s;
        }

        .form-group input:focus {
            background: white;
            border: 2px solid #007bff;
            transform: scale(1.05);
        }

        .btn-login {
            width: 100%;
            max-width: 280px;
            background: #007bff;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: 0.3s ease-in-out;
            animation: fadeIn 1s ease-in-out 1s;
        }

        .btn-login:hover {
            background: #0056b3;
            animation: pulse 0.6s ease-in-out;
        }

        .register-link {
            margin-top: 10px;
            font-size: 14px;
            color: white;
            animation: fadeIn 1s ease-in-out 1.2s;
        }

        .register-link a {
            color: #ffcc00;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .register-link a:hover {
            text-decoration: underline;
            color: #ffeb3b;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>SpeedRent</h1>
        <p>"Layanan terbaik untuk kebutuhan rental motor Anda"</p>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit" class="btn-login">Login</button>
        </form>
        <p class="register-link">Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
    </div>
</body>
</html>
