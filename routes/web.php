<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LostItemController;
use App\Http\Controllers\FoundItemController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;



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

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/lost-items/create', [LostItemController::class, 'create'])->name('lost_items.create');
Route::post('/lost-items', [LostItemController::class, 'store'])->name('lost_items.store');
Route::get('/lost-items', [LostItemController::class, 'index'])->name('lost_items.index');

Route::get('/found-items/create', [FoundItemController::class, 'create'])->name('found_items.create');
Route::post('/found-items', [FoundItemController::class, 'store'])->name('found_items.store');
Route::get('/found-items', [FoundItemController::class, 'index'])->name('found_items.index');

Route::get('/lost-items', [LostItemController::class, 'index'])->name('lost_items.index');
Route::get('/found-items', [FoundItemController::class, 'index'])->name('found_items.index');


Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcements.index');
Route::get('/announcements/{id}', [AnnouncementController::class, 'show'])->name('announcements.show');

/*Route::post('/comments/{parentId}/reply', [CommentController::class, 'reply'])->name('comments.reply');*/
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::post('/comments/{parentId}/reply', [CommentController::class, 'reply'])->name('comments.reply');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
});





