<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoundItem;
use App\Models\LostItem;
use Carbon\Carbon;

class AnnouncementController extends Controller
{
    public function index()
    {
        // Ambil semua item yang ditemukan dan hilang
        $foundItems = FoundItem::all();
        $lostItems = LostItem::all();

        // Kirim data ke view
        return view('announcements.index', compact('foundItems', 'lostItems'));
    }

    public function show($id)
    {
        // Coba temukan item berdasarkan ID, baik itu FoundItem atau LostItem
        $item = FoundItem::find($id) ?? LostItem::find($id);
        
        if (!$item) {
            abort(404, 'Item not found');
        }

        // Ambil komentar yang terkait dengan item
        $comments = $item->comments()->latest()->get();

         // Konversi waktu komentar ke zona waktu pengguna (misalnya, zona waktu default 'Asia/Jakarta')
        foreach ($comments as $comment) {
            $comment->created_at = Carbon::parse($comment->created_at)->setTimezone('Asia/Jakarta');
            // Konversi waktu balasan komentar (reply)
        foreach ($comment->replies as $reply) {
            $reply->created_at = Carbon::parse($reply->created_at)->setTimezone('Asia/Jakarta');
            }
        }

        // Kirim item dan komentar ke view
        return view('announcements.show', compact('item', 'comments'));
    }
    
}
