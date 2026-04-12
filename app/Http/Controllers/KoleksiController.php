<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class KoleksiController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::with(['author', 'category'])
            ->where('is_active', true);

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhereHas('author', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  });
            });
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Get categories for filter
        $categories = Category::where('type', Category::TYPE_BOOK)
            ->where('is_active', true)
            ->get();

        // Paginate results
        $books = $query->orderBy('order')->paginate(12);

        return view('pages.koleksi', compact('books', 'categories'));
    }

    public function api(Request $request)
    {
        $query = Book::with(['author', 'category'])
            ->where('is_active', true);

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhereHas('author', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  });
            });
        }

        // Filter by category (supports multiple categories comma-separated)
        if ($request->filled('category')) {
            $categories = explode(',', $request->category);
            $query->whereIn('category_id', $categories);
        }

        // Paginate results
        $books = $query->orderBy('order')->paginate(12);

        return response()->json([
            'books' => $books->map(function($book) {
                return [
                    'id' => $book->id,
                    'title' => $book->title,
                    'slug' => $book->slug,
                    'cover_image' => $book->cover_image,
                    'price' => $book->price,
                    'formatted_price' => $book->formatted_price,
                    'author' => $book->author ? [
                        'name' => $book->author->name,
                    ] : null,
                    'category' => $book->category ? [
                        'name' => $book->category->name,
                    ] : null,
                ];
            }),
            'pagination' => [
                'current_page' => $books->currentPage(),
                'last_page' => $books->lastPage(),
                'per_page' => $books->perPage(),
                'total' => $books->total(),
                'has_pages' => $books->hasPages(),
                'has_more_pages' => $books->hasMorePages(),
            ]
        ]);
    }
}
