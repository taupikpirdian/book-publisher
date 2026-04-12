<?php

namespace App\Http\Controllers;

use App\Models\Book;

class DetailController extends Controller
{
    public function index($slug = null)
    {
        $book = Book::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $books = Book::where('is_active', true)->latest()->take(4)->get();
        return view('pages.detail', compact('book', 'books'));
    }
}
