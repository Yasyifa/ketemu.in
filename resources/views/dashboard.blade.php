<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KETEMU.IN - Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 70vh;
            margin: 0;
            background-color: #eff3f6;
        }
        .container {
            text-align: center;
        }
        .logo img {
            width: 450px;
            margin-bottom: 0px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            margin-top: -60px;
            color: #333;
        }
        .buttons {
            margin-top: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            color: #fff;
            background-color: #2b594d;
            border: none;
            border-radius: 25px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #69c099;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Logo Section -->
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="KETEMU.IN Logo">
        </div>

        <!-- Title Section -->
        <h1>KETEMU.IN</h1>

        <!-- Buttons Section -->
        <div class="buttons">
            <a href="{{ route('login') }}" class="button">Sign In</a>
            <a href="{{ route('register') }}" class="button">Sign Up</a>
        </div>
    </div>
</body>
</html>
