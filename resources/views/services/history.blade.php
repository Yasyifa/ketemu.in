<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pengunggahan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1 class="my-4">Riwayat Pengunggahan</h1>

    <!-- Menampilkan pesan jika tidak ada riwayat pengunggahan -->
    @if($uploads->isEmpty())
        <p>Belum ada riwayat pengunggahan.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama File</th>
                    <th>Tanggal Unggah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Menampilkan setiap unggahan dalam tabel -->
                @foreach($uploads as $index => $upload)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $upload->file_name }}</td>
                        <td>{{ $upload->created_at->format('d M Y H:i') }}</td>
                        <td>
                            <!-- Tombol untuk melihat file -->
                            <a href="{{ route('uploads.show', $upload->id) }}" class="btn btn-primary btn-sm">Lihat</a>
                            <!-- Tombol untuk mengunduh file -->
                            <a href="{{ route('uploads.download', $upload->id) }}" class="btn btn-success btn-sm">Unduh</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
