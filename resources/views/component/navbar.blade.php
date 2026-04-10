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
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-brand-700 font-medium transition-colors">Beranda</a>
                <a href="{{ route('koleksi') }}" class="text-gray-600 hover:text-brand-700 font-medium transition-colors">Koleksi Buku</a>
                <a href="{{ route('layanan') }}" class="text-gray-600 hover:text-brand-700 font-medium transition-colors">Layanan Penulis</a>
                <a href="{{ route('tentang') }}" class="text-gray-600 hover:text-brand-700 font-medium transition-colors">Tentang Kami</a>
                <a href="#kirim-naskah" class="bg-brand-500 hover:bg-brand-700 text-white px-6 py-2.5 rounded-full font-medium transition-colors shadow-md hover:shadow-lg flex items-center gap-2">
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
            <a href="{{ route('home') }}" class="block px-3 py-3 text-base font-medium text-gray-700 hover:bg-brand-50 hover:text-brand-700 rounded-md">Beranda</a>
            <a href="{{ route('koleksi') }}" class="block px-3 py-3 text-base font-medium text-gray-700 hover:bg-brand-50 hover:text-brand-700 rounded-md">Koleksi Buku</a>
            <a href="{{ route('layanan') }}" class="block px-3 py-3 text-base font-medium text-gray-700 hover:bg-brand-50 hover:text-brand-700 rounded-md">Layanan Penulis</a>
            <a href="{{ route('tentang') }}" class="block px-3 py-3 text-base font-medium text-gray-700 hover:bg-brand-50 hover:text-brand-700 rounded-md">Tentang Kami</a>
            <a href="https://wa.me/6285846132417?text=Halo%20Pustaka%20Aksara,%20saya%20ingin%20mengirimkan%20naskah%20untuk%20diterbitkan.%20Mohon%20informasi%20mengenai%20persyaratan%20dan%20prosedur%20penerbitan.%20Terima%20kasih." target="_blank" class="block mt-4 text-center bg-brand-700 text-white px-3 py-3 rounded-md font-medium">Kirim Naskah Sekarang</a>
        </div>
    </div>
</nav>