<nav class="fixed w-full z-50 bg-paper/90 backdrop-blur-md border-b border-gray-200 transition-all duration-300" id="navbar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center gap-2 cursor-pointer">
                <i data-lucide="book-open" class="h-8 w-8 text-brand-700"></i>
                <span class="font-serif font-bold text-2xl text-brand-900 tracking-tight">Pustaka Aksara</span>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="#beranda" class="text-gray-600 hover:text-brand-700 font-medium transition-colors">Beranda</a>
                <a href="#koleksi" class="text-gray-600 hover:text-brand-700 font-medium transition-colors">Koleksi Buku</a>
                <a href="#layanan" class="text-gray-600 hover:text-brand-700 font-medium transition-colors">Layanan Penulis</a>
                <a href="#tentang" class="text-gray-600 hover:text-brand-700 font-medium transition-colors">Tentang Kami</a>
                <a href="#kirim-naskah" class="bg-brand-700 hover:bg-brand-900 text-white px-6 py-2.5 rounded-full font-medium transition-colors shadow-md hover:shadow-lg flex items-center gap-2">
                    <i data-lucide="pen-tool" class="w-4 h-4"></i>
                    Kirim Naskah
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-btn" class="text-gray-600 hover:text-brand-900 focus:outline-none">
                    <i data-lucide="menu" class="h-6 w-6"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Panel -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100">
        <div class="px-4 pt-2 pb-6 space-y-1 shadow-lg">
            <a href="#beranda" class="block px-3 py-3 text-base font-medium text-gray-700 hover:bg-brand-50 hover:text-brand-700 rounded-md">Beranda</a>
            <a href="#koleksi" class="block px-3 py-3 text-base font-medium text-gray-700 hover:bg-brand-50 hover:text-brand-700 rounded-md">Koleksi Buku</a>
            <a href="#layanan" class="block px-3 py-3 text-base font-medium text-gray-700 hover:bg-brand-50 hover:text-brand-700 rounded-md">Layanan Penulis</a>
            <a href="#tentang" class="block px-3 py-3 text-base font-medium text-gray-700 hover:bg-brand-50 hover:text-brand-700 rounded-md">Tentang Kami</a>
            <a href="#kirim-naskah" class="block mt-4 text-center bg-brand-700 text-white px-3 py-3 rounded-md font-medium">Kirim Naskah Sekarang</a>
        </div>
    </div>
</nav>