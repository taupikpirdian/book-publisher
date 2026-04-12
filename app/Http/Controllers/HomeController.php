<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;

class HomeController extends Controller
{
    public function index()
    {
        $heroSection = HeroSection::active()->first();
        
        return view('pages.index', compact('heroSection'));
    }
}
