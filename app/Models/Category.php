<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'type',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public const TYPE_BOOK = 'book';
    public const TYPE_FAQ = 'faq';

    protected static function booted()
    {
        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }

    public function scopeBooks($query)
    {
        return $query->where('type', self::TYPE_BOOK);
    }

    public function scopeFaqs($query)
    {
        return $query->where('type', self::TYPE_FAQ);
    }
}
