<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\FoundItem;
use App\Models\LostItem;
class HomeController extends Controller
{
    public function index()
    {
         // Ambil semua item yang ditemukan dan yang hilang
         $foundItems = FoundItem::all();
         $lostItems = LostItem::all();
 
         // Kirim data ke view home.blade.php
         return view('home', compact('foundItems', 'lostItems'));
    }
}
