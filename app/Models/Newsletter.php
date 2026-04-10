<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'name',
        'is_active',
        'is_confirmed',
        'confirmed_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_confirmed' => 'boolean',
        'confirmed_at' => 'datetime',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeConfirmed($query)
    {
        return $query->where('is_confirmed', true);
    }

    public function confirm()
    {
        $this->update([
            'is_confirmed' => true,
            'confirmed_at' => now(),
        ]);
    }
}
