@extends('layouts.app')
@section('content')
<style>
    .service-card {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    .service-card:hover {
        transform: translateY(-10px);
    }
    .blob-bg {
        background-image: radial-gradient(circle at 20% 30%, rgba(234, 179, 5, 0.1) 0%, transparent 50%);
    }
</style>

<!-- Hero Section -->
<header class="relative py-20 lg:py-32 overflow-hidden blob-bg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center lg:text-left lg:grid lg:grid-cols-2 gap-12 items-center">
        <div>
            <span class="inline-block px-4 py-1.5 bg-brand-100 text-brand-700 rounded-full text-xs font-bold tracking-widest uppercase mb-6">
                Mulai Karier Menulismu
            </span>
            <h1 class="font-serif text-4xl lg:text-6xl font-black mb-6 leading-tight">{{$service->title}}</h1>
            <p class="text-lg text-gray-600 mb-10 leading-relaxed max-w-xl mx-auto lg:mx-0">
                {{ $service->description }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                <a href="https://wa.me/6285846132417?text=Halo%20Pustaka%20Aksara,%20saya%20ingin%20konsultasi%20mengenai%20layanan%20penerbitan.%20Mohon%20informasi%20lebih%20lanjut.%20Terima%20kasih." target="_blank" class="bg-brand-900 text-white px-8 py-4 rounded-xl font-bold shadow-xl hover:bg-brand-700 transition-all flex items-center justify-center gap-2">
                    Konsultasi Gratis <i data-lucide="chevron-right" class="w-4 h-4"></i>
                </a>
            </div>
        </div>
        <div class="hidden lg:block relative">
            <div class="relative z-10 rounded-2xl overflow-hidden shadow-2xl rotate-3 transform transition-transform hover:rotate-0 duration-500">
                <img src="{{ $service->icon }}" alt="Penulis sedang menulis" class="w-full">
            </div>
            {{-- <div class="absolute -bottom-6 -left-6 bg-brand-500 p-8 rounded-2xl shadow-xl z-20">
                <p class="text-3xl font-black text-brand-900">500+</p>
                <p class="text-xs font-bold text-brand-700 uppercase">Penulis Tergabung</p>
            </div> --}}
        </div>
    </div>
</header>

<!-- Services Section -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="font-serif text-3xl font-bold mb-4">Pilih Jalur Penerbitanmu</h2>
            <div class="w-20 h-1.5 bg-brand-500 mx-auto rounded-full"></div>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @forelse($publishingPaths as $path)
            <!-- Service {{ $loop->iteration }} -->
            <div class="service-card p-8 rounded-2xl {{ $path->is_popular ? 'bg-brand-50 border-2 border-brand-500 shadow-lg relative' : 'bg-paper border border-gray-100 hover:border-brand-500 shadow-sm' }} flex flex-col">
                @if($path->is_popular)
                <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-brand-500 text-brand-900 text-[10px] font-black uppercase px-4 py-1 rounded-full tracking-widest">Paling Populer</div>
                @endif
                <div class="w-14 h-14 {{ $path->is_popular ? 'bg-brand-500 text-brand-900' : 'bg-brand-100 text-brand-600' }} rounded-xl flex items-center justify-center mb-6">
                    <i data-lucide="{{ $path->icon }}" class="w-8 h-8"></i>
                </div>
                <h3 class="text-xl font-bold mb-4 {{ $path->is_popular ? 'text-brand-900' : '' }}">{{ $path->title }}</h3>
                <p class="{{ $path->is_popular ? 'text-gray-600' : 'text-gray-500' }} text-sm mb-6 flex-grow">{{ strip_tags($path->description) }}</p>
                
                @if(count($path->features_list) > 0)
                <ul class="space-y-3 mb-8 text-sm">
                    @foreach($path->features_list as $key => $feature)
                    <li class="flex items-center gap-2 font-medium">
                        <i data-lucide="check" class="w-4 h-4 {{ $path->is_popular ? 'text-brand-500' : 'text-green-500' }}"></i>
                        {{ is_string($key) ? $key : $feature }}
                    </li>
                    @endforeach
                </ul>
                @endif
                
                @if($path->button_url)
                <a href="{{ $path->button_url }}" target="_blank" class="w-full py-3 {{ $path->is_popular ? 'bg-brand-500 text-brand-900 hover:bg-brand-600' : ($loop->iteration % 3 === 0 ? 'border-2 border-brand-900 text-brand-900 hover:bg-brand-900 hover:text-white' : 'bg-brand-900 text-white hover:bg-brand-700') }} rounded-lg font-bold transition-colors text-center">
                    {{ $path->button_text }}
                </a>
                @else
                <button class="w-full py-3 {{ $path->is_popular ? 'bg-brand-500 text-brand-900 hover:bg-brand-600' : ($loop->iteration % 3 === 0 ? 'border-2 border-brand-900 text-brand-900 hover:bg-brand-900 hover:text-white' : 'bg-brand-900 text-white hover:bg-brand-700') }} rounded-lg font-bold transition-colors">
                    {{ $path->button_text }}
                </button>
                @endif
            </div>
            @empty
            <!-- Fallback if no data -->
            <!-- Service 1 -->
            <div class="service-card p-8 rounded-2xl bg-paper border border-gray-100 hover:border-brand-500 shadow-sm flex flex-col">
                <div class="w-14 h-14 bg-brand-100 rounded-xl flex items-center justify-center text-brand-600 mb-6">
                    <i data-lucide="award" class="w-8 h-8"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Penerbitan Tradisional</h3>
                <p class="text-gray-500 text-sm mb-6 flex-grow">Seluruh biaya produksi ditanggung penerbit. Penulis menerima royalti 10% dari setiap buku yang terjual. Seleksi naskah sangat ketat.</p>
                <ul class="space-y-3 mb-8 text-sm">
                    <li class="flex items-center gap-2 font-medium"><i data-lucide="check" class="w-4 h-4 text-green-500"></i> Editing Profesional</li>
                    <li class="flex items-center gap-2 font-medium"><i data-lucide="check" class="w-4 h-4 text-green-500"></i> Desain Cover Premium</li>
                    <li class="flex items-center gap-2 font-medium"><i data-lucide="check" class="w-4 h-4 text-green-500"></i> Distribusi Toko Buku</li>
                </ul>
                <button class="w-full py-3 bg-brand-900 text-white rounded-lg font-bold hover:bg-brand-700 transition-colors">Daftarkan Naskah</button>
            </div>

            <!-- Service 2 -->
            <div class="service-card p-8 rounded-2xl bg-brand-50 border-2 border-brand-500 shadow-lg relative flex flex-col">
                <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-brand-500 text-brand-900 text-[10px] font-black uppercase px-4 py-1 rounded-full tracking-widest">Paling Populer</div>
                <div class="w-14 h-14 bg-brand-500 rounded-xl flex items-center justify-center text-brand-900 mb-6">
                    <i data-lucide="zap" class="w-8 h-8"></i>
                </div>
                <h3 class="text-xl font-bold mb-4 text-brand-900">Penerbitan Mandiri (Self-Pub)</h3>
                <p class="text-gray-600 text-sm mb-6 flex-grow">Kendali penuh di tangan Anda. Penulis menanggung biaya produksi tetapi mendapatkan 100% keuntungan setelah biaya operasional.</p>
                <ul class="space-y-3 mb-8 text-sm">
                    <li class="flex items-center gap-2 font-medium"><i data-lucide="check" class="w-4 h-4 text-brand-500"></i> ISBN & Hak Cipta</li>
                    <li class="flex items-center gap-2 font-medium"><i data-lucide="check" class="w-4 h-4 text-brand-500"></i> Tata Letak & Cetak</li>
                    <li class="flex items-center gap-2 font-medium"><i data-lucide="check" class="w-4 h-4 text-brand-500"></i> Penjualan di E-Commerce</li>
                </ul>
                <button class="w-full py-3 bg-brand-500 text-brand-900 rounded-lg font-bold hover:bg-brand-600 transition-colors">Lihat Estimasi Biaya</button>
            </div>

            <!-- Service 3 -->
            <div class="service-card p-8 rounded-2xl bg-paper border border-gray-100 hover:border-brand-500 shadow-sm flex flex-col">
                <div class="w-14 h-14 bg-brand-100 rounded-xl flex items-center justify-center text-brand-600 mb-6">
                    <i data-lucide="users" class="w-8 h-8"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Kemitraan Komunitas</h3>
                <p class="text-gray-500 text-sm mb-6 flex-grow">Kerjasama khusus untuk organisasi, sekolah, atau komunitas yang ingin menerbitkan antologi karya anggotanya dengan paket diskon besar.</p>
                <ul class="space-y-3 mb-8 text-sm">
                    <li class="flex items-center gap-2 font-medium"><i data-lucide="check" class="w-4 h-4 text-green-500"></i> Sesi Workshop Menulis</li>
                    <li class="flex items-center gap-2 font-medium"><i data-lucide="check" class="w-4 h-4 text-green-500"></i> Cetak Massal Ekonomis</li>
                    <li class="flex items-center gap-2 font-medium"><i data-lucide="check" class="w-4 h-4 text-green-500"></i> Sertifikat Penulis</li>
                </ul>
                <button class="w-full py-3 border-2 border-brand-900 text-brand-900 rounded-lg font-bold hover:bg-brand-900 hover:text-white transition-colors">Hubungi Kami</button>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="py-24 bg-brand-900 text-white relative overflow-hidden">
    <!-- Decoration Circles -->
    <div class="absolute -top-20 -right-20 w-64 h-64 bg-brand-500 opacity-10 rounded-full"></div>
    <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-brand-500 opacity-10 rounded-full"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-20">
            <h2 class="font-serif text-3xl font-bold mb-4">Alur Kerja Pustaka</h2>
            <p class="text-brand-500 font-bold uppercase tracking-widest text-xs">Dari Naskah Mentah Hingga Rak Toko</p>
        </div>

        <div class="grid md:grid-cols-4 gap-8">
            <div class="text-center group">
                <div class="w-20 h-20 bg-brand-800 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-brand-500 group-hover:text-brand-900 transition-all duration-300">
                    <span class="text-3xl font-black">01</span>
                </div>
                <h4 class="font-bold mb-3">Submisi</h4>
                <p class="text-sm text-gray-400">Kirimkan naskah atau draf ide cerita Anda melalui portal kami.</p>
            </div>
            <div class="text-center group">
                <div class="w-20 h-20 bg-brand-800 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-brand-500 group-hover:text-brand-900 transition-all duration-300">
                    <span class="text-3xl font-black">02</span>
                </div>
                <h4 class="font-bold mb-3">Kurasi & Edit</h4>
                <p class="text-sm text-gray-400">Tim editor kami akan meninjau dan membantu menyempurnakan alur cerita.</p>
            </div>
            <div class="text-center group">
                <div class="w-20 h-20 bg-brand-800 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-brand-500 group-hover:text-brand-900 transition-all duration-300">
                    <span class="text-3xl font-black">03</span>
                </div>
                <h4 class="font-bold mb-3">Produksi Visual</h4>
                <p class="text-sm text-gray-400">Pembuatan cover menarik dan tata letak interior yang nyaman dibaca.</p>
            </div>
            <div class="text-center group">
                <div class="w-20 h-20 bg-brand-800 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-brand-500 group-hover:text-brand-900 transition-all duration-300">
                    <span class="text-3xl font-black">04</span>
                </div>
                <h4 class="font-bold mb-3">Penerbitan</h4>
                <p class="text-sm text-gray-400">Buku dicetak, didistribusikan, dan dipromosikan ke seluruh Indonesia.</p>
            </div>
        </div>
    </div>
</section>

<!-- FAQ CTA -->
<section class="py-20 text-center">
    <div class="max-w-4xl mx-auto px-4">
        <h2 class="font-serif text-3xl font-bold mb-6">Punya Pertanyaan Lain?</h2>
        <p class="text-gray-500 mb-10">Kami siap menjawab segala keraguan Anda mengenai royalti, hak cipta, dan proses teknis lainnya.</p>
        <div class="flex justify-center gap-4">
            <a href="https://wa.me/6285846132417?text=Halo%20Pustaka%20Aksara,%20saya%20ingin%20bertanya%20mengenai%20layanan%20penerbitan.%20Mohon%20informasi%20lebih%20lanjut.%20Terima%20kasih." target="_blank" class="bg-brand-500 text-brand-900 px-8 py-3 rounded-full font-bold hover:shadow-lg transition-all">Hubungi Tim Editor</a>
            <a href="{{ route('faq') }}" class="bg-gray-100 text-gray-600 px-8 py-3 rounded-full font-bold hover:bg-gray-200 transition-all">Buka FAQ</a>
        </div>
    </div>
</section>
@endsection
