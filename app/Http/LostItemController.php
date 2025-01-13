<?php

namespace App\Http\Controllers;

use App\Models\LostItem;
use Illuminate\Http\Request;

class LostItemController extends Controller
{
    public function create()
    {
        return view('lost_items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'description' => 'required|string',
            'phone_number' => 'required|string|max:20',
            'last_location' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('lost_items', 'public');
        }

        LostItem::create([
            'item_name' => $request->item_name,
            'description' => $request->description,
            'phone_number' => $request->phone_number,
            'last_location' => $request->last_location,
            'image_path' => $imagePath,
            'status' => 'lost', // Status awal adalah 'lost'
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }

    // Add a method to display lost items
    public function index()
    {
        $lostItems = LostItem::where('status', 'lost')->latest()->take(6)->get();
        return view('lost_items.index', compact('lostItems'));
    }

    
}
