<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PublishingPath extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'icon',
        'description',
        'features',
        'button_text',
        'button_url',
        'is_popular',
        'order',
        'is_active',
    ];

    protected $casts = [
        'features' => 'array',
        'is_popular' => 'boolean',
        'is_active' => 'boolean',
    ];

    protected static function booted()
    {
        static::creating(function ($publishingPath) {
            if (empty($publishingPath->slug)) {
                $publishingPath->slug = Str::slug($publishingPath->title);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }

    public function getFeaturesListAttribute()
    {
        $features = $this->features ?? [];

        // New format: array of objects with feature_text, feature_description
        $isNewFormat = !empty($features) && isset($features[0]) && is_array($features[0]) && isset($features[0]['feature_text']);

        if ($isNewFormat) {
            return collect($features)->mapWithKeys(fn ($item) => [
                $item['feature_text'] => $item['feature_description'] ?? '',
            ])->toArray();
        }

        // Legacy format: key-value pairs
        return $features;
    }
}
