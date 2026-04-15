@extends('layouts.app')

@section('title', $settings->meta_title ?? 'Pustaka Aksara - Penerbit Buku Indonesia')

@section('content')
<!-- Floating Notification -->
@if(session('success') || session('error'))
    <div id="notification" class="fixed top-4 right-4 z-50 max-w-sm animate-bounce">
        <div class="bg-white border-l-4 rounded-lg shadow-xl p-4 flex items-start gap-3 {{ session('success') ? 'border-green-500' : 'border-red-500' }}">
            <div class="flex-shrink-0">
                @if(session('success'))
                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                @else
                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                @endif
            </div>
            <div class="flex-1">
                <p class="text-sm font-medium text-gray-900">{{ session('success') ?: session('error') }}</p>
            </div>
            <button onclick="document.getElementById('notification').style.display='none'" class="flex-shrink-0 text-gray-400 hover:text-gray-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>
    <script>
        // Auto hide notification after 5 seconds
        setTimeout(() => {
            const notification = document.getElementById('notification');
            if (notification) {
                notification.style.opacity = '0';
                notification.style.transition = 'opacity 0.5s ease';
                setTimeout(() => notification.remove(), 500);
            }
        }, 5000);
    </script>
@endif

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
                @if($heroSection)
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-50 border border-brand-100 text-brand-700 text-sm font-medium mb-6">
                    <span class="flex h-2 w-2 rounded-full bg-brand-500"></span>
                    {{ $heroSection->badge_text ?? $heroSection->title }}
                </div>
                <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-bold text-brand-900 leading-tight mb-6">
                   {!! $heroSection->title_highlight !!}
                </h1>
                <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                   {{ $heroSection->description }}
                </p>
                @else
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-50 border border-brand-100 text-brand-700 text-sm font-medium mb-6">
                    <span class="flex h-2 w-2 rounded-full bg-brand-500"></span>
                    {{ $settings->site_name ?? 'Pustaka Aksara' }}
                </div>
                <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-bold text-brand-900 leading-tight mb-6">
                   {{ $settings->site_name ?? 'Pustaka Aksara' }}
                </h1>
                <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                   {{ $settings->meta_description ?? 'Temukan buku-buku terbaik dan kirimkan naskah Anda untuk diterbitkan bersama ' . ($settings->site_name ?? 'Pustaka Aksara') . '.' }}
                </p>
                @endif
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('koleksi') }}" class="inline-flex justify-center items-center gap-2 bg-brand-500 hover:bg-brand-700 text-white px-8 py-3.5 rounded-full font-medium transition-all shadow-lg hover:shadow-xl">
                        <i data-lucide="library" class="w-5 h-5"></i>
                        Jelajahi Koleksi
                    </a>
                    <a href="{{ route('layanan') }}" class="inline-flex justify-center items-center gap-2 bg-white hover:bg-gray-50 text-brand-500 border border-brand-500 px-8 py-3.5 rounded-full font-medium transition-all shadow-sm hover:shadow">
                        Pelajari Penerbitan
                        <i data-lucide="arrow-right" class="w-5 h-5"></i>
                    </a>
                </div>
            </div>

            <!-- Image/Visual Content -->
            <div class="relative lg:ml-10">
                @if($heroSection && $heroSection->image_url)
                <div class="relative rounded-2xl overflow-hidden shadow-2xl aspect-[4/3] group">
                    <img src="{{ $heroSection->image_url }}" alt="{{ $heroSection->title ?? 'Hero Image' }}" class="object-cover w-full h-full transform group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end">
                        <div class="p-8 text-white">
                            @if($heroSection->quote_text)
                            <p class="font-serif text-xl italic">"{{ $heroSection->quote_text }}"</p>
                            @if($heroSection->quote_author)
                            <p class="text-sm text-gray-300 mt-2">— {{ $heroSection->quote_author }}</p>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
                @else
                <div class="relative rounded-2xl overflow-hidden shadow-2xl aspect-[4/3] bg-brand-100 flex items-center justify-center">
                    <div class="text-center p-8">
                        <i data-lucide="book-open" class="w-24 h-24 text-brand-400 mx-auto mb-4"></i>
                        <p class="font-serif text-xl text-brand-600 italic">"Membuka Jendela Dunia"</p>
                    </div>
                </div>
                @endif
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
            <a href="{{ route('koleksi') }}" class="inline-flex items-center gap-2 text-brand-700 font-medium hover:text-brand-900 transition-colors group">
                Lihat Semua Buku
                <i data-lucide="arrow-right" class="w-4 h-4 transform group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>

        <!-- Books Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Book Card 1 -->
            @foreach ($books as $book)
            <div class="group flex flex-col">
                <div class="relative mb-6 rounded-md overflow-hidden aspect-[2/3] book-shadow mx-auto w-full max-w-[240px] transform group-hover:-translate-y-2 transition-transform duration-300">
                    <div class="spine"></div>
                    <img src="{{ $book->cover_image }}" alt="{{ $book->title }}" class="w-full h-full object-cover">
                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-brand-900/0 group-hover:bg-brand-900/40 transition-colors duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                        <a href="{{ route('detail', $book->slug) }}" class="bg-white text-brand-900 px-4 py-2 rounded-full font-medium text-sm shadow-lg hover:bg-brand-50">Lihat Detail</a>
                    </div>
                </div>
                <div class="text-center sm:text-left flex-grow">
                    <div class="text-xs text-brand-700 font-semibold uppercase tracking-wider mb-2">{{ $book->category->name ?? 'Kategori Tidak Diketahui' }}</div>
                    <h3 class="font-serif font-bold text-lg text-ink leading-tight mb-1 group-hover:text-brand-700 transition-colors">{{ $book->title }}</h3>
                    <p class="text-gray-500 text-sm mb-3">Oleh <span class="font-medium text-gray-700">{{ $book->author->name }}</span></p>
                </div>
            </div>
            @endforeach
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
            @forelse($companyValues as $value)
            <!-- Feature {{ $loop->iteration }} -->
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                <div class="w-14 h-14 bg-brand-100 rounded-xl flex items-center justify-center mb-6 text-brand-700">
                    <i data-lucide="{{ $value->icon }}" class="w-7 h-7"></i>
                </div>
                <h3 class="font-serif text-xl font-bold text-ink mb-3">{{ $value->title }}</h3>
                <p class="text-gray-600 leading-relaxed">{{ $value->description }}</p>
            </div>
            @empty
            <!-- Default fallback features -->
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                <div class="w-14 h-14 bg-brand-100 rounded-xl flex items-center justify-center mb-6 text-brand-700">
                    <i data-lucide="edit-3" class="w-7 h-7"></i>
                </div>
                <h3 class="font-serif text-xl font-bold text-ink mb-3">Editorial Profesional</h3>
                <p class="text-gray-600 leading-relaxed">Tim editor berpengalaman kami akan membantu memoles naskah Anda tanpa menghilangkan suara dan gaya penulisan asli Anda.</p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                <div class="w-14 h-14 bg-brand-100 rounded-xl flex items-center justify-center mb-6 text-brand-700">
                    <i data-lucide="truck" class="w-7 h-7"></i>
                </div>
                <h3 class="font-serif text-xl font-bold text-ink mb-3">Distribusi Luas</h3>
                <p class="text-gray-600 leading-relaxed">Buku Anda akan didistribusikan ke jaringan toko buku besar nasional maupun platform digital (e-book) ternama.</p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                <div class="w-14 h-14 bg-brand-100 rounded-xl flex items-center justify-center mb-6 text-brand-700">
                    <i data-lucide="pie-chart" class="w-7 h-7"></i>
                </div>
                <h3 class="font-serif text-xl font-bold text-ink mb-3">Royalti Transparan</h3>
                <p class="text-gray-600 leading-relaxed">Kami menawarkan persentase royalti yang kompetitif dengan laporan penjualan berkala yang jelas dan tepat waktu.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Testimonial Penulis -->
@if($testimonial)
<section class="py-20 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <i data-lucide="quote" class="w-12 h-12 text-brand-200 mb-6"></i>
                <h2 class="font-serif text-3xl md:text-4xl font-bold text-brand-900 mb-6">Suara dari Para Penulis Kami</h2>
                <p class="text-lg text-gray-600 italic mb-8">
                    "{{ $testimonial->testimonial }}"
                </p>
                <div class="flex items-center gap-4">
                    @if($testimonial->photo_path)
                    <img src="{{ $testimonial->photo_url ?? $testimonial->photo_path }}" alt="Foto {{ $testimonial->name }}" class="w-14 h-14 rounded-full object-cover">
                    @else
                    <div class="w-14 h-14 rounded-full bg-brand-100 flex items-center justify-center">
                        <i data-lucide="user" class="w-7 h-7 text-brand-600"></i>
                    </div>
                    @endif
                    <div>
                        <h4 class="font-bold text-ink">{{ $testimonial->name }}</h4>
                        <p class="text-sm text-gray-500">{{ $testimonial->title }}</p>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Buku" class="rounded-xl object-cover h-64 w-full shadow-md mt-8">
            </div>
        </div>
    </div>
</section>
@endif

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
            @php
                $whatsappNumber = $settings->contact_whatsapp ?? '6285846132417';
                $whatsappMessage = urlencode('Halo ' . ($settings->site_name ?? 'Pustaka Aksara') . ', saya ingin mengirimkan naskah untuk diterbitkan. Mohon informasi mengenai persyaratan dan prosedur penerbitan. Terima kasih.');
            @endphp
            <a href="https://wa.me/{{ $whatsappNumber }}?text={{ $whatsappMessage }}" target="_blank" class="inline-flex justify-center items-center gap-2 bg-yellow-400 hover:bg-yellow-500 text-yellow-900 px-8 py-4 rounded-full font-bold text-lg transition-transform hover:scale-105 shadow-xl">
                <i data-lucide="send" class="w-5 h-5"></i>
                Kirim Naskah Sekarang
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
@endsection