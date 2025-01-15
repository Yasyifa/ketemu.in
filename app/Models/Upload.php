<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang digunakan
    protected $table = 'uploads';

    // Menentukan kolom mana yang bisa diisi
    protected $fillable = [
        'file_name',
        'file_path',
        'user_id', // Asumsi ada kolom user_id untuk mengetahui siapa yang mengunggah
    ];

    // Menentukan tipe data untuk kolom tertentu jika diperlukan
    protected $casts = [
        'created_at' => 'datetime', // Pastikan kolom created_at diformat dengan benar
    ];

    /**
     * Relasi ke pengguna (user) yang mengunggah file
     */
    public function user()
    {
        return $this->belongsTo(User::class); // Setiap upload dimiliki oleh seorang user
    }
}
