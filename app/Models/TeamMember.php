<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'photo_url',
        'bio',
        'social_linkedin',
        'social_twitter',
        'social_instagram',
        'social_dribbble',
        'social_email',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }

    public function getSocialLinksAttribute()
    {
        $links = [];
        
        if ($this->social_linkedin) {
            $links['linkedin'] = $this->social_linkedin;
        }
        if ($this->social_twitter) {
            $links['twitter'] = $this->social_twitter;
        }
        if ($this->social_instagram) {
            $links['instagram'] = $this->social_instagram;
        }
        if ($this->social_dribbble) {
            $links['dribbble'] = $this->social_dribbble;
        }
        if ($this->social_email) {
            $links['email'] = $this->social_email;
        }
        
        return $links;
    }
}
