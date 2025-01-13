<?php

namespace App\Http\Controllers;

use App\Models\FoundItem;
use Illuminate\Http\Request;

class FoundItemController extends Controller
{
    public function create()
    {
        return view('found_items.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'item_name' => 'required|string|max:255',
            'description' => 'required|string',
            'phone_number' => 'required|string|max:15',
            'current_location' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan gambar jika ada
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Simpan data ke database
        FoundItem::create([
            'item_name' => $request->item_name,
            'description' => $request->description,
            'phone_number' => $request->phone_number,
            'current_location' => $request->current_location,
            'image' => $imagePath,
            'status' => 'found', // Status awal adalah 'found'
        ]);

        return redirect()->route('found_items.create')->with('success', 'Data berhasil disimpan!');
    }

    // Add a method to display found items
    public function index()
    {
        $foundItems = FoundItem::where('status', 'found')->latest()->take(6)->get();
        return view('found_items.index', compact('foundItems'));
    }
}
