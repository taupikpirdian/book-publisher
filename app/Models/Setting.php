<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        // Site Identity
        'site_name',
        'site_tagline',
        'logo_url',
        'favicon_url',
        
        // SEO Meta Data
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_image',
        
        // Contact Information
        'contact_email',
        'contact_phone',
        'contact_address',
        'contact_whatsapp',
        
        // Social Media
        'social_instagram',
        'social_twitter',
        'social_facebook',
        'social_linkedin',
        'social_youtube',
        'social_tiktok',
        
        // Footer
        'footer_description',
        'show_social_media',
        
        // Settings
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'show_social_media' => 'boolean',
    ];

    /**
     * Get the active settings
     */
    public static function getActive()
    {
        return static::where('is_active', true)->first();
    }

    /**
     * Get setting value by key
     */
    public static function get($key, $default = null)
    {
        $setting = static::getActive();
        if (!$setting) {
            return $default;
        }
        
        return $setting->$key ?? $default;
    }

    /**
     * Update or create setting
     */
    public static function set($key, $value)
    {
        $setting = static::firstOrCreate([]);
        $setting->update([$key => $value]);
        return $setting;
    }
}
