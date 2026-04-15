<?php

namespace App\Http\Controllers;

use App\Models\PublishingPath;
use App\Models\Service;
use App\Models\Setting;

class LayananController extends Controller
{
    public function index()
    {
        $service = Service::where('is_active', true)->first();
        $publishingPaths = PublishingPath::active()->get();
        $settings = Setting::getActive();

        return view('pages.layanan', compact('service', 'publishingPaths', 'settings'));
    }
}
