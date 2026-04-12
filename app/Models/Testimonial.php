<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'photo_path',
        'testimonial',
        'book_title',
        'order',
        'is_active',
        'is_featured',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
    ];

    public function getPhotoUrlAttribute(): ?string
    {
        if (empty($this->photo_path)) {
            return null;
        }
        return asset('assets/' . $this->photo_path);
    }

    protected static function booted(): void
    {
        static::deleting(function ($testimonial) {
            if (!empty($testimonial->photo_path) && Storage::disk('public')->exists($testimonial->photo_path)) {
                Storage::disk('public')->delete($testimonial->photo_path);
            }
        });
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true)->where('is_active', true);
    }
}
