<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings - KETEMU.IN</title>

    <!-- CSS di dalam tag <style> -->
    <style>
        /* style.css */

        /* Container */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Form Styling */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #45a049;
        }

        /* Profile Picture */
        .profile-picture-preview img {
            max-width: 100px;
            border-radius: 50%;
        }

        .alert-success {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .alert-success p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Profile Settings</h2>
        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Full Name -->
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" class="input" value="{{ old('name', $user->name) }}" required>
            </div>

            <!-- Profile Picture -->
            <div class="form-group">
                <label for="profile_picture">Profile Picture</label>
                <input type="file" id="profile_picture" name="profile_picture" class="input">
                
                @if ($user->profile_picture)
                    <div class="profile-picture-preview">
                        <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="img-fluid rounded-circle mt-2" style="width: 100px;">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn">Update Profile</button>
        </form>
    </div>
</body>
</html>
