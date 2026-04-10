@extends('layouts.app')
@section('content')
<!-- Hero Section -->
<section id="beranda" class="relative pt-32 pb-20 lg:pt-40 lg:pb-28 overflow-hidden">
    <!-- Background Decoration -->
    <div class="absolute top-0 right-0 -z-10 transform translate-x-1/2 -translate-y-1/4">
        <div class="w-96 h-96 bg-brand-100 rounded-full blur-3xl opacity-50"></div>
    </div>
    <div class="absolute bottom-0 left-0 -z-10 transform -translate-x-1/2 translate-y-1/4">
        <div class="w-96 h-96 bg-yellow-100 rounded-full blur-3xl opacity-50"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-8 items-center">
            <!-- Text Content -->
            <div class="max-w-2xl">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-50 border border-brand-100 text-brand-700 text-sm font-medium mb-6">
                    <span class="flex h-2 w-2 rounded-full bg-brand-500"></span>
                    Menerbitkan lebih dari 500+ judul buku
                </div>
                <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-bold text-brand-900 leading-tight mb-6">
                    Menghidupkan Cerita, <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-500 to-brand-900">Menginspirasi Dunia.</span>
                </h1>
                <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                    Kami adalah penerbit independen yang berdedikasi mencari, memoles, dan menerbitkan karya-karya literatur terbaik dari penulis berbakat Indonesia ke genggaman pembaca.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#koleksi" class="inline-flex justify-center items-center gap-2 bg-brand-900 hover:bg-brand-800 text-white px-8 py-3.5 rounded-full font-medium transition-all shadow-lg hover:shadow-xl">
                        <i data-lucide="library" class="w-5 h-5"></i>
                        Jelajahi Koleksi
                    </a>
                    <a href="#kirim-naskah" class="inline-flex justify-center items-center gap-2 bg-white hover:bg-gray-50 text-brand-900 border border-gray-200 px-8 py-3.5 rounded-full font-medium transition-all shadow-sm hover:shadow">
                        Pelajari Penerbitan
                        <i data-lucide="arrow-right" class="w-5 h-5"></i>
                    </a>
                </div>
            </div>

            <!-- Image/Visual Content -->
            <div class="relative lg:ml-10">
                <div class="relative rounded-2xl overflow-hidden shadow-2xl aspect-[4/3] group">
                    <img src="https://images.unsplash.com/photo-1495446815901-a7297e633e8d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Tumpukan Buku Klasik" class="object-cover w-full h-full transform group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end">
                        <div class="p-8 text-white">
                            <p class="font-serif text-xl italic">"Buku adalah sihir portabel yang unik."</p>
                            <p class="text-sm text-gray-300 mt-2">— Stephen King</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Koleksi Buku Terbaru -->
<section id="koleksi" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
            <div class="max-w-2xl">
                <h2 class="font-serif text-3xl font-bold text-brand-900 mb-4">Rilis Terbaru Kami</h2>
                <p class="text-gray-600">Temukan karya fiksi dan non-fiksi terbaru yang sedang menjadi perbincangan hangat minggu ini.</p>
            </div>
            <a href="#" class="inline-flex items-center gap-2 text-brand-700 font-medium hover:text-brand-900 transition-colors group">
                Lihat Semua Buku
                <i data-lucide="arrow-right" class="w-4 h-4 transform group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>

        <!-- Books Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            
            <!-- Book Card 1 -->
            <div class="group flex flex-col">
                <div class="relative mb-6 rounded-md overflow-hidden aspect-[2/3] book-shadow mx-auto w-full max-w-[240px] transform group-hover:-translate-y-2 transition-transform duration-300">
                    <div class="spine"></div>
                    <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Cover Buku 1" class="w-full h-full object-cover">
                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-brand-900/0 group-hover:bg-brand-900/40 transition-colors duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                        <button class="bg-white text-brand-900 px-4 py-2 rounded-full font-medium text-sm shadow-lg hover:bg-brand-50">Lihat Detail</button>
                    </div>
                </div>
                <div class="text-center sm:text-left flex-grow">
                    <div class="text-xs text-brand-700 font-semibold uppercase tracking-wider mb-2">Novel Fiksi</div>
                    <h3 class="font-serif font-bold text-lg text-ink leading-tight mb-1 group-hover:text-brand-700 transition-colors">Senja di Pelabuhan Ratu</h3>
                    <p class="text-gray-500 text-sm mb-3">Oleh <span class="font-medium text-gray-700">Raka P. Dewantara</span></p>
                </div>
                <div class="flex items-center justify-between sm:justify-start gap-4 mt-auto">
                    <span class="font-bold text-lg">Rp 85.000</span>
                    <button class="text-gray-400 hover:text-brand-700" title="Tambah ke Keranjang">
                        <i data-lucide="shopping-bag" class="w-5 h-5"></i>
                    </button>
                </div>
            </div>

            <!-- Book Card 2 -->
            <div class="group flex flex-col">
                <div class="relative mb-6 rounded-md overflow-hidden aspect-[2/3] book-shadow mx-auto w-full max-w-[240px] transform group-hover:-translate-y-2 transition-transform duration-300">
                    <div class="spine"></div>
                    <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Cover Buku 2" class="w-full h-full object-cover">
                    <div class="absolute top-2 right-2 bg-yellow-400 text-yellow-900 text-xs font-bold px-2 py-1 rounded">Bestseller</div>
                    <div class="absolute inset-0 bg-brand-900/0 group-hover:bg-brand-900/40 transition-colors duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                        <button class="bg-white text-brand-900 px-4 py-2 rounded-full font-medium text-sm shadow-lg hover:bg-brand-50">Lihat Detail</button>
                    </div>
                </div>
                <div class="text-center sm:text-left flex-grow">
                    <div class="text-xs text-brand-700 font-semibold uppercase tracking-wider mb-2">Pengembangan Diri</div>
                    <h3 class="font-serif font-bold text-lg text-ink leading-tight mb-1 group-hover:text-brand-700 transition-colors">Seni Mengelola Waktu</h3>
                    <p class="text-gray-500 text-sm mb-3">Oleh <span class="font-medium text-gray-700">Dr. Sarah Wijaya</span></p>
                </div>
                <div class="flex items-center justify-between sm:justify-start gap-4 mt-auto">
                    <span class="font-bold text-lg">Rp 115.000</span>
                    <button class="text-gray-400 hover:text-brand-700" title="Tambah ke Keranjang">
                        <i data-lucide="shopping-bag" class="w-5 h-5"></i>
                    </button>
                </div>
            </div>

            <!-- Book Card 3 -->
            <div class="group flex flex-col">
                <div class="relative mb-6 rounded-md overflow-hidden aspect-[2/3] book-shadow mx-auto w-full max-w-[240px] transform group-hover:-translate-y-2 transition-transform duration-300">
                    <div class="spine"></div>
                    <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Cover Buku 3" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-brand-900/0 group-hover:bg-brand-900/40 transition-colors duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                        <button class="bg-white text-brand-900 px-4 py-2 rounded-full font-medium text-sm shadow-lg hover:bg-brand-50">Lihat Detail</button>
                    </div>
                </div>
                <div class="text-center sm:text-left flex-grow">
                    <div class="text-xs text-brand-700 font-semibold uppercase tracking-wider mb-2">Sejarah</div>
                    <h3 class="font-serif font-bold text-lg text-ink leading-tight mb-1 group-hover:text-brand-700 transition-colors">Jejak Rempah Nusantara</h3>
                    <p class="text-gray-500 text-sm mb-3">Oleh <span class="font-medium text-gray-700">Ahmad Luthfi</span></p>
                </div>
                <div class="flex items-center justify-between sm:justify-start gap-4 mt-auto">
                    <span class="font-bold text-lg">Rp 140.000</span>
                    <button class="text-gray-400 hover:text-brand-700" title="Tambah ke Keranjang">
                        <i data-lucide="shopping-bag" class="w-5 h-5"></i>
                    </button>
                </div>
            </div>

            <!-- Book Card 4 -->
            <div class="group flex flex-col">
                <div class="relative mb-6 rounded-md overflow-hidden aspect-[2/3] book-shadow mx-auto w-full max-w-[240px] transform group-hover:-translate-y-2 transition-transform duration-300">
                    <div class="spine"></div>
                    <img src="https://images.unsplash.com/photo-1525505927227-6ce1c402b123?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Cover Buku 4" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-brand-900/0 group-hover:bg-brand-900/40 transition-colors duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                        <button class="bg-white text-brand-900 px-4 py-2 rounded-full font-medium text-sm shadow-lg hover:bg-brand-50">Lihat Detail</button>
                    </div>
                </div>
                <div class="text-center sm:text-left flex-grow">
                    <div class="text-xs text-brand-700 font-semibold uppercase tracking-wider mb-2">Puisi</div>
                    <h3 class="font-serif font-bold text-lg text-ink leading-tight mb-1 group-hover:text-brand-700 transition-colors">Hujan di Bulan Juni (Edisi Khusus)</h3>
                    <p class="text-gray-500 text-sm mb-3">Oleh <span class="font-medium text-gray-700">Maya Angelina</span></p>
                </div>
                <div class="flex items-center justify-between sm:justify-start gap-4 mt-auto">
                    <span class="font-bold text-lg">Rp 75.000</span>
                    <button class="text-gray-400 hover:text-brand-700" title="Tambah ke Keranjang">
                        <i data-lucide="shopping-bag" class="w-5 h-5"></i>
                    </button>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Mengapa Memilih Kami / Layanan -->
<section id="layanan" class="py-20 bg-brand-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="font-serif text-3xl md:text-4xl font-bold text-brand-900 mb-4">Mengapa Menerbitkan Buku Bersama Kami?</h2>
            <p class="text-lg text-gray-600">Kami menawarkan ekosistem penerbitan yang transparan, profesional, dan berpihak pada penulis untuk memastikan karya Anda mencapai potensi maksimalnya.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                <div class="w-14 h-14 bg-brand-100 rounded-xl flex items-center justify-center mb-6 text-brand-700">
                    <i data-lucide="edit-3" class="w-7 h-7"></i>
                </div>
                <h3 class="font-serif text-xl font-bold text-ink mb-3">Editorial Profesional</h3>
                <p class="text-gray-600 leading-relaxed">Tim editor berpengalaman kami akan membantu memoles naskah Anda tanpa menghilangkan suara dan gaya penulisan asli Anda.</p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                <div class="w-14 h-14 bg-brand-100 rounded-xl flex items-center justify-center mb-6 text-brand-700">
                    <i data-lucide="truck" class="w-7 h-7"></i>
                </div>
                <h3 class="font-serif text-xl font-bold text-ink mb-3">Distribusi Luas</h3>
                <p class="text-gray-600 leading-relaxed">Buku Anda akan didistribusikan ke jaringan toko buku besar nasional maupun platform digital (e-book) ternama.</p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                <div class="w-14 h-14 bg-brand-100 rounded-xl flex items-center justify-center mb-6 text-brand-700">
                    <i data-lucide="pie-chart" class="w-7 h-7"></i>
                </div>
                <h3 class="font-serif text-xl font-bold text-ink mb-3">Royalti Transparan</h3>
                <p class="text-gray-600 leading-relaxed">Kami menawarkan persentase royalti yang kompetitif dengan laporan penjualan berkala yang jelas dan tepat waktu.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonial Penulis -->
<section class="py-20 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <i data-lucide="quote" class="w-12 h-12 text-brand-200 mb-6"></i>
                <h2 class="font-serif text-3xl md:text-4xl font-bold text-brand-900 mb-6">Suara dari Para Penulis Kami</h2>
                <p class="text-lg text-gray-600 italic mb-8">
                    "Pustaka Aksara tidak hanya sekadar mencetak buku saya, tapi mereka benar-benar merawat naskah saya layaknya anak sendiri. Proses editing yang diskusi yang hangat membuat karya saya jauh lebih matang dari draf awalnya."
                </p>
                <div class="flex items-center gap-4">
                    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80" alt="Foto Penulis" class="w-14 h-14 rounded-full object-cover">
                    <div>
                        <h4 class="font-bold text-ink">Nadia Larasati</h4>
                        <p class="text-sm text-gray-500">Penulis Novel Bestseller "Jingga"</p>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <img src="https://images.unsplash.com/photo-1455390582262-044cdead2708?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Proses Menulis" class="rounded-xl object-cover h-64 w-full shadow-md">
                <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Buku" class="rounded-xl object-cover h-64 w-full shadow-md mt-8">
            </div>
        </div>
    </div>
</section>

<!-- CTA / Kirim Naskah -->
<section id="kirim-naskah" class="py-20 relative overflow-hidden">
    <!-- Background dark -->
    <div class="absolute inset-0 bg-brand-900"></div>
    <!-- Pattern/texture -->
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 30px 30px;"></div>
    
    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="font-serif text-3xl md:text-5xl font-bold text-white mb-6">Punya Naskah yang Menunggu untuk Diceritakan?</h2>
        <p class="text-brand-100 text-lg mb-10 max-w-2xl mx-auto">
            Kami selalu mencari suara-suara baru yang segar dan cerita yang memikat. Jangan biarkan naskah Anda hanya tersimpan di dalam laci.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="#" class="inline-flex justify-center items-center gap-2 bg-yellow-400 hover:bg-yellow-500 text-yellow-900 px-8 py-4 rounded-full font-bold text-lg transition-transform hover:scale-105 shadow-xl">
                <i data-lucide="send" class="w-5 h-5"></i>
                Kirim Naskah Sekarang
            </a>
            <a href="#" class="inline-flex justify-center items-center gap-2 bg-transparent hover:bg-brand-800 text-white border border-brand-500 px-8 py-4 rounded-full font-medium transition-colors">
                Baca Syarat & Ketentuan
            </a>
        </div>
    </div>
</section>

<!-- Newsletter -->
<section class="py-16 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-brand-50 rounded-3xl p-8 md:p-12 flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="max-w-xl">
                <h3 class="font-serif text-2xl font-bold text-brand-900 mb-2">Jadilah yang Pertama Tahu!</h3>
                <p class="text-gray-600">Berlangganan buletin kami untuk info rilis buku terbaru, diskon spesial, dan tips menulis.</p>
            </div>
            <form class="w-full md:w-auto flex flex-col sm:flex-row gap-3">
                <input type="email" placeholder="Alamat email Anda" required class="px-5 py-3 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent min-w-[250px]">
                <button type="submit" class="bg-brand-900 hover:bg-brand-800 text-white px-6 py-3 rounded-full font-medium transition-colors whitespace-nowrap">
                    Berlangganan
                </button>
            </form>
        </div>
    </div>
</section>
@endsection