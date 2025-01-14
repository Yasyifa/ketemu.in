<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - KETEMU.IN</title>
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="login-page">
    <div class="container">
        <div class="logo-container">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
            <p class="title">KETEMU.IN</p>
        </div>
        <form class="form" action="{{ route('login') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email" class="input" required>
            <input type="password" name="password" placeholder="Password" class="input" required>
            <button type="submit" class="btn">Sign in</button>
        </form>
        <p class="redirect">Don't have an account? <a href="{{ route('register') }}" class="link">Sign Up</a></p>

    </div>
</body>
</html>
