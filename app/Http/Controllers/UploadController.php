<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    // Menyimpan file yang diunggah
    public function store(Request $request)
    {
        // Validasi file yang diunggah
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Menyimpan file
        $filePath = $request->file('file')->store('uploads', 'public');

        // Menyimpan data ke database
        $upload = new Upload();
        $upload->file_name = $request->file('file')->getClientOriginalName();
        $upload->file_path = $filePath;
        $upload->user_id = auth()->id();
        $upload->save();

        return redirect()->route('history')->with('success', 'File berhasil diunggah!');
    }

    // Menampilkan riwayat pengunggahan
    public function index()
    {
        // Ambil semua data pengunggahan
        $uploads = Upload::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();

        return view('services.history', compact('uploads'));
    }

    // Melihat file
    public function show($id)
    {
        $upload = Upload::findOrFail($id);
        
        // Cek apakah file ada dan milik pengguna yang sedang login
        if ($upload->user_id != auth()->id()) {
            abort(403); // Akses ditolak jika file bukan milik pengguna
        }

        // Menampilkan file (misalnya, gambar)
        return response()->file(storage_path("app/public/{$upload->file_path}"));
    }

    // Mengunduh file
    public function download($id)
    {
        $upload = Upload::findOrFail($id);
        
        // Cek apakah file ada dan milik pengguna yang sedang login
        if ($upload->user_id != auth()->id()) {
            abort(403); // Akses ditolak jika file bukan milik pengguna
        }

        // Mengunduh file
        return response()->download(storage_path("app/public/{$upload->file_path}"));
    }
}
