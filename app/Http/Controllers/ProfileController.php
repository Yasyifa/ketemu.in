<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    // Fungsi untuk menampilkan halaman profil pengguna
    public function profile()
    {
        $user = Auth::user(); // Ambil data user yang sedang login
        return view('profile.show', compact('user')); // Kirim data user ke view profile.show
    }

    // Fungsi untuk memperbarui profil pengguna
    public function updateProfile(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user(); // Ambil data user yang sedang login

        // Periksa apakah ada gambar yang diunggah
        if ($request->hasFile('profile_picture')) {
            // Hapus gambar lama jika ada
            if ($user->profile_picture) {
                Storage::delete($user->profile_picture);
            }

            // Simpan gambar baru
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');

            // Update data user dengan gambar baru
            $user->profile_picture = $path;
        }

        // Update nama
        $user->name = $request->input('name');

        // Simpan perubahan
        $user->save();

        return back()->with('success', 'Profile updated successfully');
    }
}
