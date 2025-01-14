<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LostItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'description',
        'phone_number',
        'last_location',
        'image_path',
        'status',
    ];

    // Relasi polymorphic ke komentar
    public function comments()
    {
        return $this->morphMany(UserComment::class, 'item');
    }

    // In LostItem and FoundItem Models
    public function getImageAttribute($value)
    {
        return $value ? $value : 'default.jpg'; // Provide a default image if none is found
    }



}
