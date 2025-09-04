<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'images',
        'description'
    ];

    protected $appends = [
        'images_url'
    ];

    public function getImagesUrlAttribute(): ?string
    {
        if (!$this->images) {
            return null;
        }
        return $this->images
            ? asset('storage/' . $this->images)
            : null;
    }
}
