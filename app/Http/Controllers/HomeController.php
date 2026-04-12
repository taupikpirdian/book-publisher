<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\Newsletter;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $heroSection = HeroSection::active()->first();
        $testimonial = Testimonial::where('is_featured', true)->where('is_active', true)->first();

        if ($request->query('success') === 'newsletter') {
            session()->flash('success', 'Terima kasih! Anda berhasil berlangganan buletin kami.');
        }

        if ($request->query('error') === 'newsletter') {
            session()->flash('error', 'Email sudah terdaftar atau tidak valid.');
        }

        return view('pages.index', compact('heroSection', 'testimonial'));
    }

    public function subscribeNewsletter(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletters,email',
        ]);

        if ($validator->fails()) {
            return redirect()->route('home', ['error' => 'newsletter']);
        }

        Newsletter::create([
            'email' => $request->email,
            'is_active' => true,
            'is_confirmed' => false,
        ]);

        return redirect()->route('home', ['success' => 'newsletter']);
    }
}
