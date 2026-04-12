<?php

namespace App\Http\Controllers;

use App\Models\AboutPage;

class TentangController extends Controller
{
    public function index()
    {
        $aboutUs = AboutPage::where('is_active', true)->first();
        return view('pages.tentang', compact('aboutUs'));
    }
}
