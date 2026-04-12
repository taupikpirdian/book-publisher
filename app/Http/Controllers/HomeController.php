<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $heroSection = HeroSection::active()->first();
        $testimonial = Testimonial::where('is_featured', true)->where('is_active', true)->first();
        
        return view('pages.index', compact('heroSection', 'testimonial'));
    }
}
