<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman</title>

    <style>
         body {
            background-color: #1d2946; /* Warna biru tua */
            color: white; /* Warna teks putih */
        }


        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            width: 300px;
            position: relative;
        }

        .card-img-top {
            height: 250px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-body {
            padding: 20px;
            min-height: 100px;
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

        .announcement {
            margin-top: 50px;
        }

        .announcement-title {
            text-align: center;
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 40px;
        }

        .status-label {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #28a745;
            color: white;
            padding: 5px 10px;
            font-size: 15px;
            border-radius: 5px;
        }

        .status-lost {
            background-color: #dc3545;
        }

        .btn-back-home {
            display: block;
            width: 200px;
            margin: 30px auto;
            padding: 10px;
            background-color: #1d2946;
            color: white;
            text-align: center;
            font-size: 18px;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-back-home:hover {
            background-color: #007bff;
        }

        /* Styling untuk form pencarian */
        .search-form {
            margin-bottom: 30px;
            text-align: center;
        }

        .search-input {
            width: 300px;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .search-button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-button:hover {
            background-color: #0056b3;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<section id="announcement" class="announcement section">
    <div class="container">
        <h2 class="announcement-title">Semua Pengumuman</h2>
        <!-- Form Pencarian -->
        <div class="search-form">
            <form action="{{ route('announcements.search') }}" method="GET">
                <input type="text" name="query" class="search-input" placeholder="Cari barang..." value="{{ request()->query('query') }}">
                <button type="submit" class="search-button">Cari</button>
            </form>
        </div>

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

        <a href="{{ route('home') }}" class="btn-back-home">Kembali ke Home</a>
    </div>
</section>

</body>
</html>
