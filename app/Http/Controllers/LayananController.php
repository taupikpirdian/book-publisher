<?php

namespace App\Http\Controllers;

use App\Models\PublishingPath;
use App\Models\Service;

class LayananController extends Controller
{
    public function index()
    {
        $service = Service::where('is_active', true)->first();
        $publishingPaths = PublishingPath::active()->get();
        
        return view('pages.layanan', compact('service', 'publishingPaths'));
    }
}
