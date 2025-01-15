<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Proses login pengguna.
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Mengarahkan ke file resources/views/auth/login.blade.php
    }
    
    public function login(Request $request)
    {
        // Validasi input login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek kredensial pengguna
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Redirect ke dashboard jika login berhasil
            return redirect()->route('home')->with('success', 'Login successful');
        }

        // Kembali ke halaman login jika gagal
        return back()->withErrors(['email' => 'Invalid email or password'])->withInput();
    }

    /**
     * Proses registrasi pengguna.
     */
    public function showRegisterForm()
    {
        return view('auth.register'); // Mengarahkan ke file resources/views/auth/register.blade.php
    }

    public function register(Request $request)
    {
        // Validasi input registrasi
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        // Simpan data pengguna ke database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, // Password akan otomatis di-hash di model
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Registration successful, please log in.');
    }

    /**
     * Logout pengguna.
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Logged out successfully.');
    }
}
