<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\CompanyValue;
use App\Models\HeroSection;
use App\Models\Newsletter;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        try {
            $heroSection = HeroSection::active()->first();
        } catch (\Exception $e) {
            Log::error('Error fetching hero section: ' . $e->getMessage());
            $heroSection = null;
        }

        try {
            $testimonial = Testimonial::where('is_featured', true)
                ->where('is_active', true)
                ->first();
        } catch (\Exception $e) {
            Log::error('Error fetching testimonial: ' . $e->getMessage());
            $testimonial = null;
        }

        try {
            $companyValues = CompanyValue::active()->get();
        } catch (\Exception $e) {
            Log::error('Error fetching company values: ' . $e->getMessage());
            $companyValues = collect();
        }

        if ($request->query('success') === 'newsletter') {
            session()->flash('success', 'Terima kasih! Anda berhasil berlangganan buletin kami.');
        }

        if ($request->query('error') === 'newsletter') {
            session()->flash('error', 'Email sudah terdaftar atau tidak valid.');
        }

        try {
            $books = Book::where('is_active', true)
                ->where('is_featured', true)
                ->with(['category', 'author'])
                ->latest()
                ->take(4)
                ->get();
        } catch (\Exception $e) {
            Log::error('Error fetching books: ' . $e->getMessage());
            $books = collect();
        }

        return view('pages.index', compact('heroSection', 'testimonial', 'books', 'companyValues'));
    }

    public function subscribeNewsletter(Request $request)
    {
        try {
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
        } catch (\Exception $e) {
            Log::error('Error subscribing newsletter: ' . $e->getMessage());
            return redirect()->route('home', ['error' => 'newsletter']);
        }
    }
}
