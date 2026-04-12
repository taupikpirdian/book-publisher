<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AssetImage extends Model
{
    protected $fillable = [
        'name',
        'file_path',
        'file_type',
        'file_size',
    ];

    protected $casts = [
        'file_size' => 'integer',
    ];

    public function getUrlAttribute(): string
    {
        return url($this->file_path);
    }

    protected static function booted(): void
    {
        static::deleting(function ($asset) {
            if (file_exists(public_path($asset->file_path))) {
                unlink(public_path($asset->file_path));
            }
        });
    }

    public static function uploadImage($file, ?string $name = null): self
    {
        $filename = time() . '_' . $file->getClientOriginalName();
        $relativePath = 'assets/images/' . $filename;
        $fullPath = public_path($relativePath);
        
        \Illuminate\Support\Facades\File::ensureDirectoryExists(dirname($fullPath));
        $file->move(dirname($fullPath), $filename);

        return self::create([
            'name' => $name ?? $file->getClientOriginalName(),
            'file_path' => $relativePath,
            'file_type' => $file->getMimeType(),
            'file_size' => $file->getSize(),
        ]);
    }
}
