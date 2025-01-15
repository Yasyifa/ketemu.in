<?php

namespace App\Http\Controllers;

use App\Models\UserComment;
use App\Models\FoundItem;
use App\Models\LostItem;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Menyimpan komentar baru
    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|integer',
            'item_type' => 'required|string',
            'comment' => 'required|string',
        ]);

        $item = $this->getItem($request->item_id, $request->item_type);

        if (!$item) {
            return redirect()->back()->with('error', 'Item not found.');
        }

        $comment = UserComment::create([
            'item_id' => $request->item_id,
            'item_type' => $request->item_type,
            'user_id' => auth()->id(),
            'comment' => $request->comment,
        ]);

        return redirect()->route('announcements.show', $item->id)->with('success', 'Comment added!');
    }

    // Menyimpan balasan komentar
    public function reply(Request $request, $parentId)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);

        $parentComment = UserComment::findOrFail($parentId);

        $item = $this->getItem($parentComment->item_id, $parentComment->item_type);

        if (!$item) {
            return redirect()->back()->with('error', 'Item not found.');
        }

        $reply = UserComment::create([
            'item_id' => $parentComment->item_id,
            'item_type' => $parentComment->item_type,
            'user_id' => auth()->id(),
            'comment' => $request->comment,
            'parent_id' => $parentComment->id, // Menandakan ini adalah balasan
        ]);

        return redirect()->route('announcements.show', $item->id)->with('success', 'Reply added!');
    }

    // Mendapatkan item berdasarkan ID dan tipe (polymorphic)
    private function getItem($itemId, $itemType)
    {
        if ($itemType == 'App\Models\FoundItem') {
            return FoundItem::find($itemId);
        } elseif ($itemType == 'App\Models\LostItem') {
            return LostItem::find($itemId);
        }

        return null;
    }
}
