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
</style>

<br>
<br>
<br>

<!-- Page Title & Search Area -->
<header class="bg-white pt-12 pb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="font-serif text-4xl font-bold text-brand-900 mb-6">Koleksi Buku Kami</h1>

        <div class="flex flex-col lg:flex-row gap-4 items-center">
            <!-- Search Bar -->
            <div class="relative w-full lg:flex-grow">
                <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                <input type="text" placeholder="Cari judul, penulis, atau genre..." class="w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all">
            </div>

            <!-- Sort Dropdown -->
            {{-- <div class="flex gap-2 w-full lg:w-auto">
                <select class="w-full lg:w-48 px-4 py-3.5 bg-white border border-gray-200 rounded-xl text-sm font-medium focus:outline-none focus:border-brand-500 cursor-pointer">
                    <option>Terbaru</option>
                    <option>Harga: Rendah ke Tinggi</option>
                    <option>Harga: Tinggi ke Rendah</option>
                    <option>Terpopuler</option>
                </select>
                <button class="lg:hidden p-3.5 bg-brand-500 text-white rounded-xl">
                    <i data-lucide="filter" class="w-6 h-6"></i>
                </button>
            </div> --}}
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
                        <input type="checkbox" checked class="w-4 h-4 accent-brand-500 rounded">
                        <span class="text-sm text-gray-600 group-hover:text-brand-900">Semua Kategori</span>
                    </label>
                    <label class="flex items-center gap-3 group cursor-pointer">
                        <input type="checkbox" class="w-4 h-4 accent-brand-500 rounded">
                        <span class="text-sm text-gray-600 group-hover:text-brand-900">Fiksi & Sastra</span>
                    </label>
                    <label class="flex items-center gap-3 group cursor-pointer">
                        <input type="checkbox" class="w-4 h-4 accent-brand-500 rounded">
                        <span class="text-sm text-gray-600 group-hover:text-brand-900">Pengembangan Diri</span>
                    </label>
                    <label class="flex items-center gap-3 group cursor-pointer">
                        <input type="checkbox" class="w-4 h-4 accent-brand-500 rounded">
                        <span class="text-sm text-gray-600 group-hover:text-brand-900">Sejarah & Budaya</span>
                    </label>
                    <label class="flex items-center gap-3 group cursor-pointer">
                        <input type="checkbox" class="w-4 h-4 accent-brand-500 rounded">
                        <span class="text-sm text-gray-600 group-hover:text-brand-900">Anak & Remaja</span>
                    </label>
                    <label class="flex items-center gap-3 group cursor-pointer">
                        <input type="checkbox" class="w-4 h-4 accent-brand-500 rounded">
                        <span class="text-sm text-gray-600 group-hover:text-brand-900">Biografi</span>
                    </label>
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
                <button class="flex-shrink-0 px-4 py-2 bg-brand-500 text-white rounded-full text-sm font-bold shadow-sm">Semua</button>
                <button class="flex-shrink-0 px-4 py-2 bg-white border border-gray-200 rounded-full text-sm font-medium">Fiksi</button>
                <button class="flex-shrink-0 px-4 py-2 bg-white border border-gray-200 rounded-full text-sm font-medium">Pengembangan Diri</button>
                <button class="flex-shrink-0 px-4 py-2 bg-white border border-gray-200 rounded-full text-sm font-medium">Sejarah</button>
                <button class="flex-shrink-0 px-4 py-2 bg-white border border-gray-200 rounded-full text-sm font-medium">Anak</button>
            </div>

            <!-- Active Filter Tags -->
            <div class="flex flex-wrap items-center gap-3 mb-8">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Filter Aktif:</span>
                <div class="flex items-center gap-1.5 px-3 py-1 bg-gray-100 rounded-full text-[11px] font-bold text-gray-700">
                    Fiksi & Sastra
                    <button class="hover:text-red-500"><i data-lucide="x" class="w-3 h-3"></i></button>
                </div>
                <button class="text-[11px] font-bold text-brand-500 hover:underline">Hapus Semua</button>
            </div>

            <!-- Grid -->
            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6 sm:gap-8">

                <!-- Book Item 1 -->
                <div class="group flex flex-col">
                    <div class="relative mb-4 aspect-[2/3] rounded overflow-hidden bg-white book-card-shadow">
                        <div class="spine-line"></div>
                        <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Buku" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-brand-900/60 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col items-center justify-center gap-3">
                            <a href="detail-buku.html" class="bg-brand-500 text-brand-900 px-4 py-2 rounded-full font-bold text-xs transform translate-y-4 group-hover:translate-y-0 transition-transform">Lihat Detail</a>
                            <button class="bg-white text-brand-900 px-4 py-2 rounded-full font-bold text-xs transform translate-y-4 group-hover:translate-y-0 transition-transform delay-75">Beli Cepat</button>
                        </div>
                    </div>
                    <div class="flex-grow">
                        <p class="text-[10px] font-bold text-brand-600 uppercase mb-1">Novel</p>
                        <h3 class="font-serif font-bold text-sm sm:text-base leading-snug group-hover:text-brand-500 transition-colors line-clamp-2 mb-1">Senja di Pelabuhan Ratu</h3>
                        <p class="text-xs text-gray-500 mb-2">Raka P. Dewantara</p>
                    </div>
                    {{-- <p class="font-bold text-brand-900">Rp 85.000</p> --}}
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-16 flex justify-center items-center gap-2">
                <button class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-lg text-gray-400 hover:border-brand-500 hover:text-brand-500 transition-colors">
                    <i data-lucide="chevron-left" class="w-5 h-5"></i>
                </button>
                <button class="w-10 h-10 flex items-center justify-center bg-brand-500 text-brand-900 font-bold rounded-lg shadow-sm">1</button>
                <button class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-lg text-gray-600 hover:border-brand-500 transition-colors font-medium">2</button>
                <button class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-lg text-gray-600 hover:border-brand-500 transition-colors font-medium">3</button>
                <span class="px-2 text-gray-400">...</span>
                <button class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-lg text-gray-600 hover:border-brand-500 transition-colors font-medium">12</button>
                <button class="w-10 h-10 flex items-center justify-center border border-gray-200 rounded-lg text-gray-400 hover:border-brand-500 hover:text-brand-500 transition-colors">
                    <i data-lucide="chevron-right" class="w-5 h-5"></i>
                </button>
            </div>
        </div>
    </div>
</main>

<!-- Simple Newsletter -->
<section class="bg-brand-500 py-12 mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-8">
        <div class="text-center md:text-left">
            <h2 class="font-serif text-2xl font-bold text-brand-900 mb-2">Jangan Lewatkan Buku Baru</h2>
            <p class="text-brand-900/70 text-sm">Dapatkan update rilis terbaru dan promo eksklusif setiap bulannya.</p>
        </div>
        <div class="flex w-full max-w-md gap-2">
            <input type="email" placeholder="Alamat email Anda" class="flex-grow px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-brand-900/20">
            <button class="bg-brand-900 text-white px-6 py-3 rounded-xl font-bold text-sm whitespace-nowrap">Langganan</button>
        </div>
    </div>
</section>
@endsection
