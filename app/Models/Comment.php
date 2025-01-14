<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'comment', 'found_item_id', 'lost_item_id', 'user_id'];

    // Relasi dengan pengguna
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan item yang ditemukan
    public function foundItem()
    {
        return $this->belongsTo(FoundItem::class);
    }

    // Relasi dengan item yang hilang
    public function lostItem()
    {
        return $this->belongsTo(LostItem::class);
    }
}
