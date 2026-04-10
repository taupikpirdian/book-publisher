<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'photo_url',
        'birth_place',
        'birth_date',
        'biography',
        'achievements',
        'email',
        'website',
        'is_active',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'is_active' => 'boolean',
    ];

    protected static function booted()
    {
        static::creating(function ($author) {
            if (empty($author->slug)) {
                $author->slug = Str::slug($author->name);
            }
        });
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function getAchiementsListAttribute()
    {
        return $this->achievements ? explode("\n", $this->achievements) : [];
    }
}
