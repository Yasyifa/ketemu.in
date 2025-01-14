<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman</title>

    <!-- Tambahkan CSS langsung di sini -->
    <style>
        body {
            padding-top: 0px; /* Menambahkan jarak atas pada body */
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px; /* Memberikan jarak antar card */
            width: 300px;
            position: relative; /* Untuk positioning status di dalam card */
        }

        .card-img-top {
            height: 250px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-body {
            padding: 20px;
            min-height: 100px; /* Menjamin card tidak terlalu pendek */
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
        }

        .card-text {
            font-size: 14px;
            color: #555;
        }

        .card .btn-primary {
            background-color: #007bff;
            border: none;
            color: white;
        }

        /* Anda juga bisa menambahkan margin-top pada section jika ingin lebih banyak ruang */
        .announcement {
            margin-top: 50px; /* Jarak antara konten dengan bagian atas */
        }

        /* Styling untuk judul pengumuman */
        .announcement-title {
            text-align: center;
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 40px;
        }

        /* Styling untuk status */
        .status-label {
            position: absolute;
            top: 10px; /* Menempatkan status di atas gambar */
            left: 10px; /* Menempel ke kiri */
            background-color: #28a745; /* Default warna status 'found' */
            color: white;
            padding: 5px 10px;
            font-size: 15px;
            border-radius: 5px;
        }

        /* Menambahkan warna untuk status 'lost' */
        .status-lost {
            background-color: #dc3545;
        }
    </style>

    <!-- Pastikan Bootstrap di-load jika diperlukan -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Pengumuman Index -->
<section id="announcement" class="announcement section">
    <div class="container">
        <!-- Judul Pengumuman -->
        <h2 class="announcement-title">Semua Pengumuman</h2>

        <div class="row">
            @foreach($foundItems as $item)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="Found Item Image">
                        <div class="status-label {{ strtolower($item->status) === 'lost' ? 'status-lost' : '' }}">
                            {{ $item->status === 'found' ? 'Ditemukan' : (strtolower($item->status) === 'lost' ? 'Hilang' : $item->status) }}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->item_name }}</h5>
                            <p class="card-text">{{ Str::limit($item->description, 100) }}</p>
                            <a href="{{ route('announcements.show', $item->id) }}" class="btn btn-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach

            @foreach($lostItems as $item)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ asset('storage/' . $item->image_path) }}" class="card-img-top" alt="Lost Item Image">
                        <div class="status-label {{ strtolower($item->status) === 'lost' ? 'status-lost' : '' }}">
                            {{ $item->status === 'found' ? 'Ditemukan' : (strtolower($item->status) === 'lost' ? 'Hilang' : $item->status) }}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->item_name }}</h5>
                            <p class="card-text">{{ Str::limit($item->description, 100) }}</p>
                            <a href="{{ route('announcements.show', $item->id) }}" class="btn btn-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

</body>
</html>
