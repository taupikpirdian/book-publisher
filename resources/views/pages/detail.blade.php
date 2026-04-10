@extends('layouts.app')
@section('content')
<style>
    .book-shadow {
        box-shadow: -10px 10px 30px rgba(0,0,0,0.15), 0 0 5px rgba(0,0,0,0.05);
    }
    .spine-effect {
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 8px;
        background: linear-gradient(to right, rgba(0,0,0,0.2) 0%, rgba(255,255,255,0.1) 50%, rgba(0,0,0,0.05) 100%);
        z-index: 10;
    }
    .tab-active {
        border-bottom: 3px solid #eab305;
        color: #1c1917;
    }
</style>

<br>
<br>
<br>

<!-- Product Section -->
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-16">
    <div class="lg:grid lg:grid-cols-12 lg:gap-16 items-start">

        <!-- Left: Book Visuals -->
        <div class="lg:col-span-5 mb-10 lg:mb-0">
            <div class="sticky top-24">
                <div class="relative group cursor-zoom-in">
                    <div class="aspect-[2/3] relative rounded-r-lg overflow-hidden book-shadow">
                        <div class="spine-effect"></div>
                        <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Senja di Pelabuhan Ratu" class="w-full h-full object-cover">
                    </div>
                    <div class="mt-6 grid grid-cols-4 gap-4">
                        <button class="aspect-square border-2 border-brand-500 rounded-md overflow-hidden bg-white">
                            <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" alt="Thumbnail 1" class="w-full h-full object-cover opacity-100">
                        </button>
                        <button class="aspect-square border border-gray-200 rounded-md overflow-hidden bg-white hover:border-brand-500 transition-colors">
                            <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" alt="Thumbnail 2" class="w-full h-full object-cover opacity-60">
                        </button>
                        <div class="aspect-square border border-gray-200 rounded-md flex flex-col items-center justify-center text-gray-400 text-xs">
                            <i data-lucide="image" class="w-5 h-5 mb-1"></i>
                            Intip Isi
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right: Book Details -->
        <div class="lg:col-span-7">
            <nav class="flex mb-4 text-xs font-bold uppercase tracking-widest text-brand-700 gap-2">
                <a href="#" class="hover:text-brand-900">Katalog</a>
                <span>/</span>
                <a href="#" class="hover:text-brand-900">Fiksi</a>
                <span>/</span>
                <span class="text-gray-400">Novel</span>
            </nav>

            <h1 class="font-serif text-3xl md:text-5xl font-bold text-brand-900 mb-2 leading-tight">Senja di Pelabuhan Ratu</h1>
            <p class="text-lg md:text-xl text-gray-500 mb-6">Oleh <a href="#" class="text-brand-700 hover:underline font-medium">Raka P. Dewantara</a></p>

            {{-- <div class="flex items-center gap-4 mb-8">
                <div class="flex text-brand-500">
                    <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                    <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                    <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                    <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                    <i data-lucide="star-half" class="w-5 h-5 fill-current"></i>
                </div>
                <span class="text-sm font-semibold text-gray-700">4.7 (128 Ulasan)</span>
                <span class="text-gray-300">|</span>
                <span class="text-sm text-green-600 font-bold flex items-center gap-1">
                    <i data-lucide="check-circle" class="w-4 h-4"></i> Stok Tersedia
                </span>
            </div> --}}

            {{-- <div class="bg-brand-50 rounded-2xl p-6 mb-8 border border-brand-100">
                <div class="flex items-baseline gap-3 mb-4">
                    <span class="text-3xl font-black text-brand-900">Rp 85.000</span>
                    <span class="text-lg text-gray-400 line-through">Rp 110.000</span>
                    <span class="bg-red-100 text-red-600 text-xs font-bold px-2 py-1 rounded">Hemat 23%</span>
                </div>

                <!-- Format Selection -->
                <div class="space-y-3">
                    <p class="text-sm font-bold text-gray-700 uppercase tracking-wider">Pilih Format:</p>
                    <div class="grid grid-cols-2 gap-4">
                        <label class="relative flex flex-col p-4 bg-white border-2 border-brand-500 rounded-xl cursor-pointer shadow-sm">
                            <input type="radio" name="format" value="cetak" class="sr-only" checked>
                            <span class="text-sm font-bold">Buku Cetak</span>
                            <span class="text-xs text-gray-500">Soft Cover + Pembatas</span>
                            <div class="absolute top-2 right-2 text-brand-500">
                                <i data-lucide="check-circle-2" class="w-5 h-5"></i>
                            </div>
                        </label>
                        <label class="relative flex flex-col p-4 bg-white border border-gray-200 rounded-xl cursor-pointer hover:border-brand-500 transition-colors">
                            <input type="radio" name="format" value="ebook" class="sr-only">
                            <span class="text-sm font-bold">E-Book (PDF/EPUB)</span>
                            <span class="text-xs text-gray-500 text-brand-600">Rp 45.000</span>
                        </label>
                    </div>
                </div>
            </div> --}}

            <!-- Actions -->
            {{-- <div class="flex flex-col sm:flex-row gap-4 mb-10">
                <button class="flex-grow bg-brand-500 hover:bg-brand-600 text-brand-900 font-black py-4 rounded-xl shadow-lg transition-transform hover:-translate-y-1 flex items-center justify-center gap-3">
                    <i data-lucide="shopping-bag" class="w-5 h-5"></i>
                    Tambah ke Keranjang
                </button>
                <button class="bg-white border-2 border-brand-500 text-brand-900 p-4 rounded-xl hover:bg-brand-50 transition-colors">
                    <i data-lucide="heart" class="w-6 h-6"></i>
                </button>
            </div> --}}

            <!-- Tabs -->
            <div class="border-b border-gray-200 mb-6">
                <div class="flex gap-8">
                    <button id="tab-sinopsis" onclick="switchTab('sinopsis')" class="pb-4 text-sm font-bold uppercase tracking-wider tab-active">Sinopsis</button>
                    <button id="tab-detail" onclick="switchTab('detail')" class="pb-4 text-sm font-bold uppercase tracking-wider text-gray-400 hover:text-ink transition-colors">Detail Buku</button>
                    <button id="tab-penulis" onclick="switchTab('penulis')" class="pb-4 text-sm font-bold uppercase tracking-wider text-gray-400 hover:text-ink transition-colors">Penulis</button>
                </div>
            </div>

            <!-- Tab Content: Sinopsis -->
            <div id="content-sinopsis" class="tab-content">
                <div class="prose prose-sm text-gray-600 leading-relaxed max-w-none">
                    <p class="mb-4">
                        Berlatar di pesisir selatan Jawa yang mistis, <strong>Senja di Pelabuhan Ratu</strong> mengisahkan tentang Arka, seorang jurnalis yang mencoba mengungkap misteri hilangnya kapal-kapal nelayan di malam purnama. Namun, pencariannya justru membawanya pada pertemuan tak terduga dengan seorang wanita misterius di tepi tebing yang tampaknya tahu lebih banyak tentang ombak daripada manusia manapun.
                    </p>
                    <p>
                        Sebuah narasi tentang kehilangan, harapan, dan rahasia yang disimpan oleh samudera. Raka P. Dewantara kembali dengan gaya bahasa yang puitis namun tetap tajam, mengajak pembaca menyelami kedalaman emosi sedalam Samudera Hindia.
                    </p>
                </div>
            </div>

            <!-- Tab Content: Detail Buku -->
            <div id="content-detail" class="tab-content hidden">
                <div class="prose prose-sm text-gray-600 leading-relaxed max-w-none">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <p class="text-[10px] text-gray-400 uppercase font-bold tracking-widest mb-1">Judul</p>
                            <p class="text-sm font-bold">Senja di Pelabuhan Ratu</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 uppercase font-bold tracking-widest mb-1">Penulis</p>
                            <p class="text-sm font-bold">Raka P. Dewantara</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 uppercase font-bold tracking-widest mb-1">ISBN</p>
                            <p class="text-sm font-bold">978-602-123-456-7</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 uppercase font-bold tracking-widest mb-1">Penerbit</p>
                            <p class="text-sm font-bold">Pustaka Nusantara</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 uppercase font-bold tracking-widest mb-1">Tanggal Terbit</p>
                            <p class="text-sm font-bold">Maret 2026</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 uppercase font-bold tracking-widest mb-1">Jumlah Halaman</p>
                            <p class="text-sm font-bold">320 halaman</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 uppercase font-bold tracking-widest mb-1">Bahasa</p>
                            <p class="text-sm font-bold">Indonesia</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 uppercase font-bold tracking-widest mb-1">Dimensi</p>
                            <p class="text-sm font-bold">14 x 20.5 cm</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 uppercase font-bold tracking-widest mb-1">Berat</p>
                            <p class="text-sm font-bold">350 gram</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 uppercase font-bold tracking-widest mb-1">Jenis Sampul</p>
                            <p class="text-sm font-bold">Soft Cover</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab Content: Penulis -->
            <div id="content-penulis" class="tab-content hidden">
                <div class="prose prose-sm text-gray-600 leading-relaxed max-w-none">
                    <div class="flex items-start gap-6 mb-6">
                        <div class="w-32 h-32 rounded-full overflow-hidden flex-shrink-0 bg-gray-200">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" alt="Raka P. Dewantara" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1">
                            <h3 class="font-serif text-2xl font-bold text-brand-900 mb-2">Raka P. Dewantara</h3>
                            <p class="text-sm text-gray-500 mb-4">
                                Lahir di Yogyakarta, 15 Mei 1985. Penulis novel dan cerpen yang telah menerbitkan lebih dari 20 karya fiksi. Lulusan Sastra Indonesia dari Universitas Gadjah Mada yang kemudian mendalami ilmu Penulisan Kreatif di Universitas Indonesia.
                            </p>
                        </div>
                    </div>
                    <p class="mb-4">
                        Raka P. Dewantara adalah salah satu suara paling menonjol dalam sastra kontemporer Indonesia. Karyanya sering mengangkat tema kearifan lokal, mitologi Jawa, dan hubungan manusia dengan alam. Beberapa penghargaan yang pernah diraih:
                    </p>
                    <ul class="list-disc pl-5 mb-4 space-y-2">
                        <li>Pemenang Sayembara Novel Badan Bahasa 2020</li>
                        <li>Finalis Khatulistiwa Literary Award 2022</li>
                        <li>Penerima Anugerah Kebudayaan dari Kementerian Pendidikan dan Kebudayaan 2023</li>
                    </ul>
                    <p>
                        Selain menulis, Raka juga aktif mengajar di berbagai workshop penulisan kreatif dan sering menjadi pembicara di festival sastra nasional maupun internasional.
                    </p>
                </div>
            </div>

            <!-- Book Metadata Quick Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-10 pt-8 border-t border-gray-100">
                <div>
                    <p class="text-[10px] text-gray-400 uppercase font-bold tracking-widest mb-1">ISBN</p>
                    <p class="text-sm font-bold">978-602-123-456-7</p>
                </div>
                <div>
                    <p class="text-[10px] text-gray-400 uppercase font-bold tracking-widest mb-1">Halaman</p>
                    <p class="text-sm font-bold">320 Hlm</p>
                </div>
                <div>
                    <p class="text-[10px] text-gray-400 uppercase font-bold tracking-widest mb-1">Terbit</p>
                    <p class="text-sm font-bold">Maret 2026</p>
                </div>
                <div>
                    <p class="text-[10px] text-gray-400 uppercase font-bold tracking-widest mb-1">Bahasa</p>
                    <p class="text-sm font-bold">Indonesia</p>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
function switchTab(tabName) {
    // Hide all tab contents
    const tabContents = document.querySelectorAll('.tab-content');
    tabContents.forEach(content => {
        content.classList.add('hidden');
    });
    
    // Remove active state from all tabs
    const tabs = document.querySelectorAll('[id^="tab-"]');
    tabs.forEach(tab => {
        tab.classList.remove('tab-active');
        tab.classList.add('text-gray-400');
    });
    
    // Show selected tab content
    const selectedContent = document.getElementById(`content-${tabName}`);
    if (selectedContent) {
        selectedContent.classList.remove('hidden');
    }
    
    // Activate selected tab
    const selectedTab = document.getElementById(`tab-${tabName}`);
    if (selectedTab) {
        selectedTab.classList.add('tab-active');
        selectedTab.classList.remove('text-gray-400');
    }
}
</script>

<!-- Related Books -->
<section class="bg-brand-50/50 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="font-serif text-2xl font-bold text-brand-900 mb-10 border-l-4 border-brand-500 pl-4">Mungkin Anda Juga Suka</h2>

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
            <!-- Related Item 1 -->
            <a href="#" class="group">
                <div class="aspect-[2/3] bg-white rounded shadow-sm overflow-hidden mb-4 transform group-hover:-translate-y-2 transition-transform duration-300">
                    <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Buku Lain" class="w-full h-full object-cover">
                </div>
                <h3 class="font-serif font-bold text-sm text-brand-900 line-clamp-1 group-hover:text-brand-500">Jejak Rempah Nusantara</h3>
                <p class="text-xs text-gray-500">Ahmad Luthfi</p>
                <p class="mt-2 font-bold text-brand-900 text-sm">Rp 140.000</p>
            </a>

            <!-- View More Circle -->
            <div class="flex items-center justify-center">
                <a href="/koleksi" class="w-16 h-16 rounded-full border-2 border-brand-500 flex items-center justify-center text-brand-500 hover:bg-brand-500 hover:text-white transition-all transform hover:scale-110">
                    <i data-lucide="plus" class="w-8 h-8"></i>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
