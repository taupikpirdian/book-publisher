<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::where('is_active', true)
            ->with('category')
            ->orderBy('order')
            ->get();

        $categoryFaqs = Category::where('type', 'faq')->get();

        return view('pages.faq', compact('faqs', 'categoryFaqs'));
    }
}
