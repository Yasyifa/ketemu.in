<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserComment extends Model
{
    use HasFactory;

    protected $table = 'user_comments'; // Nama tabel

    protected $fillable = [
        'item_id',
        'item_type',
        'user_id',
        'comment',
        'parent_id',
    ];

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi polimorfik dengan item (LostItem atau FoundItem)
    public function item()
    {
        return $this->morphTo();
    }

    // Relasi untuk balasan komentar
    public function replies()
    {
        return $this->hasMany(UserComment::class, 'parent_id');
    }
}
