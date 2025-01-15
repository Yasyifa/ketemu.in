<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LostItemController;
use App\Http\Controllers\FoundItemController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UploadController;


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/lost-items/create', function () {
    return view('lost_items.create');
})->name('lost_items.create');

Route::get('/found-items/create', function () {
    return view('found_items.create');
})->name('found_items.create');

// Rute untuk Login dan Register (dengan middleware guest)
Route::middleware('guest')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
});

// Rute untuk halaman utama dan pengumuman
Route::get('/', [AnnouncementController::class, 'index'])->name('index'); // Halaman pengumuman untuk pengguna yang belum login

// Rute untuk halaman beranda (hanya setelah login)
Route::middleware(['auth'])->get('/home', [HomeController::class, 'home'])->name('home');

// Rute untuk Item Hilang dan Ditemukan

    Route::get('/lost-items/create', [LostItemController::class, 'create'])->name('lost_items.create');
    Route::post('/lost-items/store', [LostItemController::class, 'store'])->name('lost_items.store');
    Route::get('/lost-items', [LostItemController::class, 'index'])->name('lost_items.index');

    Route::get('/found-items/create', [FoundItemController::class, 'create'])->name('found_items.create');
    Route::post('/found-items/store', [FoundItemController::class, 'store'])->name('found_items.store');
    Route::get('/found-items', [FoundItemController::class, 'index'])->name('found_items.index');

    

Route::middleware('auth')->group(function () {
    // Rute untuk Pengumuman dan Profil
    Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcements.index');
    Route::get('/announcements/{id}', [AnnouncementController::class, 'show'])->name('announcements.show');
    
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');

    Route::get('/announcements/search', [AnnouncementController::class, 'search'])->name('announcements.search');
    // Rute untuk Riwayat Upload
    /*Route::get('/history', [UploadHistoryController::class, 'index'])->name('history');*/
});

Route::middleware('auth')->post('/upload', [UploadController::class, 'store'])->name('upload.store');


// Rute untuk komentar (dapat diakses oleh semua pengguna)
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::post('/comments/{parentId}/reply', [CommentController::class, 'reply'])->name('comments.reply');

// Rute untuk logout (hanya bisa diakses oleh pengguna yang sudah login)
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');



    Route::middleware('auth')->group(function () {
        // Rute untuk melihat riwayat pengunggahan
        Route::get('/history', [UploadController::class, 'index'])->name('history');
        
        // Rute untuk mengunggah file
        Route::post('/upload', [UploadController::class, 'store'])->name('upload.store');
        
        // Rute untuk melihat file
        Route::get('/uploads/{id}', [UploadController::class, 'show'])->name('uploads.show');
        
        // Rute untuk mengunduh file
        Route::get('/uploads/{id}/download', [UploadController::class, 'download'])->name('uploads.download');
    });
    









