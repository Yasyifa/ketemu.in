<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Laporan Kehilangan</title>
    <!-- CSS Khusus Halaman -->
    <style>
        /* Container utama untuk membedakan dengan halaman lain */
        html, body {
            margin: 0;
            padding: 0;
            height: 100vh; /* Tinggi penuh layar */
            font-family: 'Poppins', sans-serif;
            background-color: #e8e9f5; /* Warna latar belakang */
        }

        .lost-item-form-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 40px;
            background-color: #ffffff;
            box-shadow: 0 8px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            font-family: 'Poppins', sans-serif;
        }

        .lost-item-form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.5rem;
            color: #333;
        }

        .lost-item-form-container label {
            display: block;
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 5px;
        }

        .lost-item-form-container input[type="text"],
        .lost-item-form-container textarea,
        .lost-item-form-container input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .lost-item-form-container button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        .lost-item-form-container button#back-btn {
            background-color: #6c757d;
        }

        .lost-item-form-container button:hover {
            background-color: #0056b3;
        }

        .lost-item-form-container #imagePreview img {
            max-width: 100%;
            margin-top: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <div class="lost-item-form-container">
    <h2>FORM KEHILANGAN</h2>
    <form action="{{ route('lost_items.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="item_name">Nama Barang:</label>
        <input type="text" id="item_name" name="item_name" required><br>

        <label for="description">Deskripsi Barang:</label>
        <textarea id="description" name="description" required></textarea><br>

        <label for="phone_number">Nomor Telepon:</label>
        <input type="text" id="phone_number" name="phone_number" required><br>

        <label for="last_location">Lokasi Terakhir:</label>
        <input type="text" id="last_location" name="last_location" required><br>

        <label for="image">Upload Foto:</label>
        <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)">
        <div id="imagePreview"><p>Gambar akan muncul di sini...</p></div>

        <button type="submit">Unggah</button>
        <button type="button" id="back-btn" onclick="goBack()">Kembali</button>
    </form>
</div>
<script>
    // Preview Image
    function previewImage(event) {
        const imagePreview = document.getElementById('imagePreview');
        imagePreview.innerHTML = ''; // Reset preview
        const file = event.target.files[0];
        if (file) {
            const img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            imagePreview.appendChild(img);
        } else {
            imagePreview.innerHTML = '<p>Gambar akan muncul di sini...</p>';
        }
    }

    // Button Back
    function goBack() {
        window.history.back();
    }
</script>
</body>

</html>
