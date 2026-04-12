@extends('layouts.app')
@section('content')
<style>
    .book-card-shadow {
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }
    .book-card-shadow:hover {
        box-shadow: 0 10px 30px rgba(234, 179, 5, 0.15);
    }
    .spine-line {
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 3px;
        background: linear-gradient(to right, rgba(0,0,0,0.1), transparent);
    }
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.8);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.3s;
    }
    .loading-overlay.active {
        opacity: 1;
        pointer-events: all;
    }
</style>

<br>
<br>
<br>

<!-- Loading Overlay -->
<div id="loadingOverlay" class="loading-overlay">
    <div class="flex flex-col items-center gap-3">
        <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-brand-500"></div>
        <p class="text-sm text-gray-600">Memuat data...</p>
    </div>
</div>

<!-- Page Title & Search Area -->
<header class="bg-white pt-12 pb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="font-serif text-4xl font-bold text-brand-900 mb-6">Koleksi Buku Kami</h1>

        <div class="flex flex-col lg:flex-row gap-4 items-center">
            <!-- Search Bar -->
            <div class="relative w-full lg:flex-grow">
                <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                <input type="text" id="searchInput" value="{{ request('search') }}" placeholder="Cari judul, penulis, atau genre..." class="w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all">
            </div>
        </div>
    </div>
</header>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex flex-col lg:grid lg:grid-cols-12 gap-10">

        <!-- Sidebar Filters (Desktop) -->
        <aside class="hidden lg:block lg:col-span-3 space-y-8">
            <div>
                <h3 class="font-bold text-brand-900 mb-4 flex items-center gap-2">
                    <i data-lucide="layers" class="w-4 h-4 text-brand-500"></i>
                    Kategori
                </h3>
                <div class="space-y-2">
                    <label class="flex items-center gap-3 group cursor-pointer">
                        <input type="checkbox" id="category_all" {{ !request('category') ? 'checked' : '' }} class="category-filter w-4 h-4 accent-brand-500 rounded">
                        <span class="text-sm text-gray-600 group-hover:text-brand-900">Semua Kategori</span>
                    </label>
                    @foreach($categories as $cat)
                    <label class="flex items-center gap-3 group cursor-pointer">
                        <input type="checkbox" value="{{ $cat->id }}" class="category-filter w-4 h-4 accent-brand-500 rounded">
                        <span class="text-sm text-gray-600 group-hover:text-brand-900">{{ $cat->name }}</span>
                    </label>
                    @endforeach
                </div>
            </div>

            {{-- <div class="pt-6 border-t border-gray-100">
                <h3 class="font-bold text-brand-900 mb-4 flex items-center gap-2">
                    <i data-lucide="tag" class="w-4 h-4 text-brand-500"></i>
                    Rentang Harga
                </h3>
                <div class="space-y-4">
                    <input type="range" min="0" max="500000" step="10000" class="w-full accent-brand-500">
                    <div class="flex justify-between text-xs font-bold text-gray-500 uppercase">
                        <span>Rp 0</span>
                        <span>Rp 500rb+</span>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="pt-6 border-t border-gray-100">
                <h3 class="font-bold text-brand-900 mb-4 flex items-center gap-2">
                    <i data-lucide="award" class="w-4 h-4 text-brand-500"></i>
                    Format
                </h3>
                <div class="flex flex-wrap gap-2">
                    <button class="px-3 py-1.5 rounded-full border border-gray-200 text-xs font-medium hover:border-brand-500 transition-colors">Hardback</button>
                    <button class="px-3 py-1.5 rounded-full border border-brand-500 bg-brand-50 text-brand-700 text-xs font-bold">Paperback</button>
                    <button class="px-3 py-1.5 rounded-full border border-gray-200 text-xs font-medium hover:border-brand-500 transition-colors">E-Book</button>
                </div>
            </div> --}}
        </aside>

        <!-- Main Catalog Grid -->
        <div class="lg:col-span-9">
            <!-- Mobile Category Scroller -->
            <div class="lg:hidden flex overflow-x-auto gap-2 pb-6 no-scrollbar">
                <button class="mobile-category-btn flex-shrink-0 px-4 py-2 bg-brand-500 text-white rounded-full text-sm font-bold shadow-sm" data-category="">Semua</button>
                @foreach($categories as $cat)
                <button class="mobile-category-btn flex-shrink-0 px-4 py-2 bg-white border border-gray-200 rounded-full text-sm font-medium" data-category="{{ $cat->id }}">{{ $cat->name }}</button>
                @endforeach
            </div>

            <!-- Active Filter Tags -->
            <div id="activeFilters" class="flex flex-wrap items-center gap-3 mb-8" style="display: none;">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Filter Aktif:</span>
                <div id="activeFilterTags" class="flex flex-wrap gap-2"></div>
                <button id="clearFilters" class="text-[11px] font-bold text-brand-500 hover:underline">Hapus Semua</button>
            </div>

            <!-- Grid Container -->
            <div id="booksContainer" class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6 sm:gap-8">
                @forelse($books as $book)
                <!-- Book Item -->
                <div class="group flex flex-col">
                    <div class="relative mb-4 aspect-[2/3] rounded overflow-hidden bg-white book-card-shadow">
                        <div class="spine-line"></div>
                        @if($book->cover_image)
                        <img src="{{ $book->cover_image }}" alt="{{ $book->title }}" class="w-full h-full object-cover">
                        @else
                        <div class="w-full h-full flex items-center justify-center bg-gray-100">
                            <i data-lucide="book" class="w-16 h-16 text-gray-300"></i>
                        </div>
                        @endif
                        <div class="absolute inset-0 bg-brand-900/60 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col items-center justify-center gap-3">
                            <a href="{{ route('detail', $book->slug) }}" class="bg-brand-500 text-brand-900 px-4 py-2 rounded-full font-bold text-xs transform translate-y-4 group-hover:translate-y-0 transition-transform">Lihat Detail</a>
                        </div>
                    </div>
                    <div class="flex-grow">
                        @if($book->category)
                        <p class="text-[10px] font-bold text-brand-600 uppercase mb-1">{{ $book->category->name }}</p>
                        @endif
                        <h3 class="font-serif font-bold text-sm sm:text-base leading-snug group-hover:text-brand-500 transition-colors line-clamp-2 mb-1">{{ $book->title }}</h3>
                        @if($book->author)
                        <p class="text-xs text-gray-500 mb-2">{{ $book->author->name }}</p>
                        @endif
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12">
                    <i data-lucide="book-open" class="w-16 h-16 text-gray-300 mx-auto mb-4"></i>
                    <p class="text-gray-500">Tidak ada buku yang ditemukan</p>
                </div>
                @endforelse
            </div>

            <!-- Pagination Container -->
            <div id="paginationContainer" class="mt-16 flex justify-center items-center gap-2">
                @if($books->hasPages())
                    @if($books->onFirstPage())
                    <button class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-lg text-gray-400 cursor-not-allowed">
                        <i data-lucide="chevron-left" class="w-5 h-5"></i>
                    </button>
                    @else
                    <button onclick="loadPage({{ $books->currentPage() - 1 }})" class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-lg text-gray-600 hover:border-brand-500 hover:text-brand-500 transition-colors">
                        <i data-lucide="chevron-left" class="w-5 h-5"></i>
                    </button>
                    @endif

                    @for($i = 1; $i <= $books->lastPage(); $i++)
                        @if($i == $books->currentPage())
                        <button class="w-10 h-10 flex items-center justify-center bg-brand-500 text-brand-900 font-bold rounded-lg shadow-sm">{{ $i }}</button>
                        @else
                        <button onclick="loadPage({{ $i }})" class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-lg text-gray-600 hover:border-brand-500 transition-colors font-medium">{{ $i }}</button>
                        @endif
                    @endfor

                    @if($books->hasMorePages())
                    <button onclick="loadPage({{ $books->currentPage() + 1 }})" class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-lg text-gray-600 hover:border-brand-500 hover:text-brand-500 transition-colors">
                        <i data-lucide="chevron-right" class="w-5 h-5"></i>
                    </button>
                    @else
                    <button class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-lg text-gray-400 cursor-not-allowed">
                        <i data-lucide="chevron-right" class="w-5 h-5"></i>
                    </button>
                    @endif
                @endif
            </div>
        </div>
    </div>
</main>

<!-- Newsletter -->
<section class="py-16 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-brand-50 rounded-3xl p-8 md:p-12 flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="max-w-xl">
                <h3 class="font-serif text-2xl font-bold text-brand-900 mb-2">Jadilah yang Pertama Tahu!</h3>
                <p class="text-gray-600">Berlangganan buletin kami untuk info rilis buku terbaru, diskon spesial, dan tips menulis.</p>
            </div>
            <form action="{{ route('newsletter.subscribe') }}" method="POST" class="w-full md:w-auto flex flex-col sm:flex-row gap-3">
                @csrf
                <input type="email" name="email" placeholder="Alamat email Anda" required class="px-5 py-3 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent min-w-[250px]">
                <button type="submit" class="bg-brand-500 hover:bg-brand-700 text-white px-6 py-3 rounded-full font-medium transition-colors whitespace-nowrap">
                    Berlangganan
                </button>
            </form>
        </div>
    </div>
</section>

<!-- AJAX Script for Real-time Filtering -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    let debounceTimer;
    const searchInput = document.getElementById('searchInput');
    const categoryCheckboxes = document.querySelectorAll('.category-filter');
    const categoryAllCheckbox = document.getElementById('category_all');
    const loadingOverlay = document.getElementById('loadingOverlay');
    const booksContainer = document.getElementById('booksContainer');
    const paginationContainer = document.getElementById('paginationContainer');
    const activeFiltersDiv = document.getElementById('activeFilters');
    const activeFilterTags = document.getElementById('activeFilterTags');
    const clearFiltersBtn = document.getElementById('clearFilters');
    const mobileCategoryBtns = document.querySelectorAll('.mobile-category-btn');

    // Search input with debounce
    searchInput.addEventListener('input', function() {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(() => {
            loadBooks(1);
        }, 500);
    });

    // Category checkboxes (desktop)
    categoryCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            if (this.id === 'category_all' && this.checked) {
                categoryCheckboxes.forEach(cb => {
                    if (cb.id !== 'category_all') cb.checked = false;
                });
            } else if (this.id !== 'category_all' && this.checked) {
                categoryAllCheckbox.checked = false;
            }
            loadBooks(1);
        });
    });

    // Mobile category buttons
    mobileCategoryBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            mobileCategoryBtns.forEach(b => {
                b.classList.remove('bg-brand-500', 'text-white');
                b.classList.add('bg-white', 'text-gray-700', 'border', 'border-gray-200');
            });
            this.classList.remove('bg-white', 'text-gray-700', 'border', 'border-gray-200');
            this.classList.add('bg-brand-500', 'text-white');
            
            const category = this.dataset.category;
            if (category) {
                categoryCheckboxes.forEach(cb => {
                    cb.checked = cb.value == category;
                });
                categoryAllCheckbox.checked = false;
            } else {
                categoryCheckboxes.forEach(cb => cb.checked = false);
                categoryAllCheckbox.checked = true;
            }
            loadBooks(1);
        });
    });

    // Clear all filters
    clearFiltersBtn.addEventListener('click', function() {
        searchInput.value = '';
        categoryCheckboxes.forEach(cb => cb.checked = false);
        categoryAllCheckbox.checked = true;
        mobileCategoryBtns.forEach(b => {
            b.classList.remove('bg-brand-500', 'text-white');
            b.classList.add('bg-white', 'text-gray-700', 'border', 'border-gray-200');
        });
        mobileCategoryBtns[0].classList.remove('bg-white', 'text-gray-700', 'border', 'border-gray-200');
        mobileCategoryBtns[0].classList.add('bg-brand-500', 'text-white');
        loadBooks(1);
    });

    // Load books function
    function loadBooks(page = 1) {
        const search = searchInput.value;
        const selectedCategories = Array.from(categoryCheckboxes)
            .filter(cb => cb.checked && cb.id !== 'category_all')
            .map(cb => cb.value);

        const params = new URLSearchParams();
        if (search) params.set('search', search);
        if (selectedCategories.length > 0) params.set('category', selectedCategories.join(','));
        if (page > 1) params.set('page', page);

        loadingOverlay.classList.add('active');

        fetch(`{{ route('koleksi.api') }}?${params.toString()}`)
            .then(response => response.json())
            .then(data => {
                updateBooksGrid(data.books);
                updatePagination(data.pagination);
                updateActiveFilters(search, selectedCategories);
                loadingOverlay.classList.remove('active');
            })
            .catch(error => {
                console.error('Error loading books:', error);
                loadingOverlay.classList.remove('active');
            });
    }

    // Update books grid
    function updateBooksGrid(books) {
        booksContainer.innerHTML = '';
        
        if (books.length === 0) {
            booksContainer.innerHTML = `
                <div class="col-span-full text-center py-12">
                    <i data-lucide="book-open" class="w-16 h-16 text-gray-300 mx-auto mb-4"></i>
                    <p class="text-gray-500">Tidak ada buku yang ditemukan</p>
                </div>
            `;
            lucide.createIcons();
            return;
        }

        books.forEach(book => {
            const bookHtml = `
                <div class="group flex flex-col">
                    <div class="relative mb-4 aspect-[2/3] rounded overflow-hidden bg-white book-card-shadow">
                        <div class="spine-line"></div>
                        ${book.cover_image 
                            ? `<img src="${book.cover_image}" alt="${book.title}" class="w-full h-full object-cover">`
                            : `<div class="w-full h-full flex items-center justify-center bg-gray-100">
                                 <i data-lucide="book" class="w-16 h-16 text-gray-300"></i>
                               </div>`
                        }
                        <div class="absolute inset-0 bg-brand-900/60 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col items-center justify-center gap-3">
                            <a href="/detail/${book.slug}" class="bg-brand-500 text-brand-900 px-4 py-2 rounded-full font-bold text-xs transform translate-y-4 group-hover:translate-y-0 transition-transform">Lihat Detail</a>
                        </div>
                    </div>
                    <div class="flex-grow">
                        ${book.category ? `<p class="text-[10px] font-bold text-brand-600 uppercase mb-1">${book.category.name}</p>` : ''}
                        <h3 class="font-serif font-bold text-sm sm:text-base leading-snug group-hover:text-brand-500 transition-colors line-clamp-2 mb-1">${book.title}</h3>
                        ${book.author ? `<p class="text-xs text-gray-500 mb-2">${book.author.name}</p>` : ''}
                    </div>
                </div>
            `;
            booksContainer.insertAdjacentHTML('beforeend', bookHtml);
        });
        
        lucide.createIcons();
    }

    // Update pagination
    function updatePagination(pagination) {
        paginationContainer.innerHTML = '';
        
        if (!pagination.has_pages) return;

        // Previous button
        if (pagination.current_page === 1) {
            paginationContainer.insertAdjacentHTML('beforeend', `
                <button class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-lg text-gray-400 cursor-not-allowed">
                    <i data-lucide="chevron-left" class="w-5 h-5"></i>
                </button>
            `);
        } else {
            paginationContainer.insertAdjacentHTML('beforeend', `
                <button onclick="loadPage(${pagination.current_page - 1})" class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-lg text-gray-600 hover:border-brand-500 hover:text-brand-500 transition-colors">
                    <i data-lucide="chevron-left" class="w-5 h-5"></i>
                </button>
            `);
        }

        // Page numbers
        for (let i = 1; i <= pagination.last_page; i++) {
            if (i === pagination.current_page) {
                paginationContainer.insertAdjacentHTML('beforeend', `
                    <button class="w-10 h-10 flex items-center justify-center bg-brand-500 text-brand-900 font-bold rounded-lg shadow-sm">${i}</button>
                `);
            } else {
                paginationContainer.insertAdjacentHTML('beforeend', `
                    <button onclick="loadPage(${i})" class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-lg text-gray-600 hover:border-brand-500 transition-colors font-medium">${i}</button>
                `);
            }
        }

        // Next button
        if (pagination.has_more_pages) {
            paginationContainer.insertAdjacentHTML('beforeend', `
                <button onclick="loadPage(${pagination.current_page + 1})" class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-lg text-gray-600 hover:border-brand-500 hover:text-brand-500 transition-colors">
                    <i data-lucide="chevron-right" class="w-5 h-5"></i>
                </button>
            `);
        } else {
            paginationContainer.insertAdjacentHTML('beforeend', `
                <button class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-lg text-gray-400 cursor-not-allowed">
                    <i data-lucide="chevron-right" class="w-5 h-5"></i>
                </button>
            `);
        }
        
        lucide.createIcons();
    }

    // Update active filters display
    function updateActiveFilters(search, categories) {
        activeFilterTags.innerHTML = '';
        const hasFilters = search || categories.length > 0;
        
        if (!hasFilters) {
            activeFiltersDiv.style.display = 'none';
            return;
        }

        activeFiltersDiv.style.display = 'flex';

        if (search) {
            activeFilterTags.insertAdjacentHTML('beforeend', `
                <div class="flex items-center gap-1.5 px-3 py-1 bg-gray-100 rounded-full text-[11px] font-bold text-gray-700">
                    Pencarian: "${search}"
                    <button onclick="clearSearch()" class="hover:text-red-500"><i data-lucide="x" class="w-3 h-3"></i></button>
                </div>
            `);
        }

        categories.forEach(catId => {
            const cat = @json($categories).find(c => c.id == catId);
            if (cat) {
                activeFilterTags.insertAdjacentHTML('beforeend', `
                    <div class="flex items-center gap-1.5 px-3 py-1 bg-gray-100 rounded-full text-[11px] font-bold text-gray-700">
                        ${cat.name}
                        <button onclick="removeCategory(${catId})" class="hover:text-red-500"><i data-lucide="x" class="w-3 h-3"></i></button>
                    </div>
                `);
            }
        });
        
        lucide.createIcons();
    }

    // Global functions for onclick handlers
    window.loadPage = function(page) {
        loadBooks(page);
    };

    window.clearSearch = function() {
        searchInput.value = '';
        loadBooks(1);
    };

    window.removeCategory = function(catId) {
        const checkbox = document.querySelector(`.category-filter[value="${catId}"]`);
        if (checkbox) {
            checkbox.checked = false;
            loadBooks(1);
        }
    };
});
</script>
@endsection
