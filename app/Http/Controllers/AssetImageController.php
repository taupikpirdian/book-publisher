<?php

namespace App\Http\Controllers;

use App\Models\AssetImage;
use Illuminate\Support\Facades\Storage;

class AssetImageController extends Controller
{
    public function show(string $uuid)
    {
        $asset = AssetImage::where('uuid', $uuid)->firstOrFail();

        if (!Storage::disk('public')->exists($asset->file_path)) {
            abort(404);
        }

        return Storage::disk('public')->response($asset->file_path);
    }
}
