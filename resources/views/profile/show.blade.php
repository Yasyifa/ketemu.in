<!-- resources/views/profile/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h1, h2 {
            color: #333;
        }

        /* Container */
        .container {
            width: 60%; /* Memperkecil lebar kontainer */
            max-width: 600px; /* Menetapkan lebar maksimal */
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Profile Section */
        .profile-section {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-section h2 {
            font-size: 22px; /* Memperkecil ukuran font */
            margin-bottom: 10px;
        }

        .profile-section img {
            width: 80px; /* Memperkecil ukuran gambar */
            height: 80px;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .profile-section p {
            font-size: 14px; /* Memperkecil ukuran font */
            color: #777;
        }

        /* Form Styling */
        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 15px; /* Memperkecil jarak antar form */
        }

        label {
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 6px;
            color: #555;
        }

        input[type="text"],
        input[type="file"] {
            width: 50%; /* Memperkecil panjang kotakan */
            padding: 8px; /* Memperkecil padding */
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px; /* Memperkecil ukuran font */
            color: #333;
            background-color: #f9f9f9;
            margin: 0 auto; /* Menyelaraskan input ke tengah */
        }

        input[type="text"]:focus,
        input[type="file"]:focus {
            border-color: #4CAF50;
            outline: none;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 18px; /* Memperkecil padding */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px; /* Memperkecil ukuran font */
            transition: background-color 0.3s;
            margin: 0 auto;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Success Message */
        .alert-success {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-size: 14px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                width: 90%; /* Lebar kontainer lebih kecil pada perangkat kecil */
                padding: 15px;
            }

            .profile-section img {
                width: 70px; /* Memperkecil ukuran gambar */
                height: 70px;
            }

            button {
                padding: 8px 15px; /* Memperkecil padding pada tombol */
                font-size: 12px; /* Memperkecil ukuran font pada tombol */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Profile</h1>

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Profile Section -->
        <div class="profile-section">
            <h2>{{ $user->name }}</h2>
            @if ($user->profile_picture)
                <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture">
            @else
                <p>No profile picture</p>
            @endif
        </div>

        <!-- Form to Edit Profile -->
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Full Name -->
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            </div>

            <!-- Profile Picture -->
            <div class="form-group">
                <label for="profile_picture">Profile Picture</label>
                <input type="file" id="profile_picture" name="profile_picture">
            </div>

            <!-- Submit Button -->
            <button type="submit">Update Profile</button>
        </form>
    </div>
</body>
</html>
