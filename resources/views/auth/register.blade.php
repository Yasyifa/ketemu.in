<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - KETEMU.IN</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="login-page">
    <div class="container">
        <div class="logo-container">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
            <p class="title">KETEMU.IN</p>
        </div>
        <form class="form" action="{{ route('register') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Full Name" class="input" required>
            <input type="email" name="email" placeholder="Email" class="input" required>
            <input type="password" name="password" placeholder="Password" class="input" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" class="input" required>
            <button type="submit" class="btn">Sign Up</button>
        </form>
        <p class="redirect">Already have an account? <a href="{{ route('login') }}" class="link">Sign in</a></p>
    </div>
</body>
</html>
