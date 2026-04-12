@extends('layouts.app')
@section('content')
<style>
    .value-card {
        transition: all 0.3s ease;
    }
    .value-card:hover {
        border-color: #eab305;
        background-color: #fefce8;
    }
    .team-member img {
        filter: grayscale(100%);
        transition: all 0.5s ease;
    }
    .team-member:hover img {
        filter: grayscale(0%);
        transform: scale(1.05);
    }
</style>

<!-- Story Section -->
<section class="py-20 lg:py-28 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-2 gap-16 items-center">
            <div class="relative mb-12 lg:mb-0">
                <img src="{{ $aboutUs->hero_image }}" alt="Perpustakaan klasik" class="rounded-3xl shadow-2xl relative z-10">
                <div class="absolute -bottom-10 -right-10 w-64 h-64 bg-brand-500 rounded-3xl -z-0 opacity-20"></div>
            </div>
            <div>
                <span class="text-brand-600 font-bold tracking-widest text-xs uppercase mb-4 block">Kisah Kami</span>
                <h1 class="font-serif text-4xl lg:text-5xl font-black mb-8 leading-tight">{{ $aboutUs->title }}</h1>
                <div class="space-y-6 text-gray-600 leading-relaxed">
                    {!! $aboutUs->description !!}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="bg-brand-900 py-16 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <p class="text-xl lg:text-2xl font-serif italic leading-relaxed text-gray-200">
            "Setiap buku yang kami terbitkan adalah langkah kecil menuju mimpi besar: membangun Indonesia yang lebih literat, lebih kritis, dan lebih kaya ide."
        </p>
    </div>
</section>

<!-- Vision & Values -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-20">
            <h2 class="font-serif text-3xl font-bold mb-4">Misi & Nilai Kami</h2>
            <p class="text-gray-500">Kami bekerja dengan prinsip yang kuat untuk memastikan literasi Indonesia terus tumbuh dan memiliki standar kualitas yang tinggi.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="value-card p-10 border border-gray-100 rounded-3xl text-center">
                <div class="w-16 h-16 bg-brand-50 text-brand-600 rounded-2xl flex items-center justify-center mx-auto mb-8">
                    <i data-lucide="eye" class="w-8 h-8"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Visi Kami</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Menjadi lokomotif utama pergerakan literasi kreatif di Asia Tenggara yang menghubungkan penulis berbakat dengan pembaca global.</p>
            </div>
            <div class="value-card p-10 border border-gray-100 rounded-3xl text-center">
                <div class="w-16 h-16 bg-brand-50 text-brand-600 rounded-2xl flex items-center justify-center mx-auto mb-8">
                    <i data-lucide="shield-check" class="w-8 h-8"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Integritas Kualitas</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Kami tidak pernah mengkompromikan kualitas editing, desain, maupun kertas untuk setiap buku yang menyandang nama Pustaka Aksara.</p>
            </div>
            <div class="value-card p-10 border border-gray-100 rounded-3xl text-center">
                <div class="w-16 h-16 bg-brand-50 text-brand-600 rounded-2xl flex items-center justify-center mx-auto mb-8">
                    <i data-lucide="heart" class="w-8 h-8"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Pendekatan Humanis</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Bagi kami, penulis adalah mitra kreatif, bukan sekadar klien. Kami membangun hubungan jangka panjang yang saling mendukung.</p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-24 bg-paper">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
            <div class="max-w-xl">
                <h2 class="font-serif text-3xl font-bold mb-4">Tim di Balik Layar</h2>
                <p class="text-gray-500 text-sm">Para pecinta buku, editor teliti, dan desainer kreatif yang berkolaborasi untuk menghadirkan karya terbaik di rak buku Anda.</p>
            </div>
            <button class="text-brand-600 font-bold flex items-center gap-2 hover:gap-4 transition-all">
                Lihat Seluruh Tim <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Team Member 1 -->
            <div class="team-member group">
                <div class="aspect-square overflow-hidden rounded-2xl mb-6 bg-gray-200">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="CEO" class="w-full h-full object-cover">
                </div>
                <h4 class="font-bold text-lg mb-1">Adrian Pratama</h4>
                <p class="text-brand-600 text-xs font-bold uppercase tracking-widest mb-4">Founder & CEO</p>
                <div class="flex gap-3 opacity-0 group-hover:opacity-100 transition-opacity">
                    <i data-lucide="linkedin" class="w-4 h-4 text-gray-400 hover:text-brand-500 cursor-pointer"></i>
                    <i data-lucide="twitter" class="w-4 h-4 text-gray-400 hover:text-brand-500 cursor-pointer"></i>
                </div>
            </div>
            <!-- Team Member 2 -->
            <div class="team-member group text-right lg:text-left">
                <div class="aspect-square overflow-hidden rounded-2xl mb-6 bg-gray-200">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Editor" class="w-full h-full object-cover">
                </div>
                <h4 class="font-bold text-lg mb-1">Siska Wijaya</h4>
                <p class="text-brand-600 text-xs font-bold uppercase tracking-widest mb-4">Chief Editor</p>
                <div class="flex gap-3 justify-end lg:justify-start opacity-0 group-hover:opacity-100 transition-opacity">
                    <i data-lucide="linkedin" class="w-4 h-4 text-gray-400 hover:text-brand-500 cursor-pointer"></i>
                </div>
            </div>
            <!-- Team Member 3 -->
            <div class="team-member group">
                <div class="aspect-square overflow-hidden rounded-2xl mb-6 bg-gray-200">
                    <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Art Director" class="w-full h-full object-cover">
                </div>
                <h4 class="font-bold text-lg mb-1">Raka Bumi</h4>
                <p class="text-brand-600 text-xs font-bold uppercase tracking-widest mb-4">Creative Director</p>
                <div class="flex gap-3 opacity-0 group-hover:opacity-100 transition-opacity">
                    <i data-lucide="instagram" class="w-4 h-4 text-gray-400 hover:text-brand-500 cursor-pointer"></i>
                    <i data-lucide="dribbble" class="w-4 h-4 text-gray-400 hover:text-brand-500 cursor-pointer"></i>
                </div>
            </div>
            <!-- Team Member 4 -->
            <div class="team-member group text-right lg:text-left">
                <div class="aspect-square overflow-hidden rounded-2xl mb-6 bg-gray-200">
                    <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Marketing" class="w-full h-full object-cover">
                </div>
                <h4 class="font-bold text-lg mb-1">Maya Lestari</h4>
                <p class="text-brand-600 text-xs font-bold uppercase tracking-widest mb-4">Head of Marketing</p>
                <div class="flex gap-3 justify-end lg:justify-start opacity-0 group-hover:opacity-100 transition-opacity">
                    <i data-lucide="linkedin" class="w-4 h-4 text-gray-400 hover:text-brand-500 cursor-pointer"></i>
                    <i data-lucide="mail" class="w-4 h-4 text-gray-400 hover:text-brand-500 cursor-pointer"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Partners / Publishers -->
<section class="py-16 bg-white border-y border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-center text-[10px] font-black uppercase tracking-[0.3em] text-gray-400 mb-10">Bekerjasama Dengan</p>
        <div class="flex flex-wrap justify-center items-center gap-12 lg:gap-24 opacity-40 grayscale">
            <span class="text-2xl font-black italic">BOOKSMART</span>
            <span class="text-2xl font-black">LITERA.id</span>
            <span class="text-2xl font-serif">Kalam Nusantara</span>
            <span class="text-2xl font-bold tracking-tighter">GLOBALPRESS</span>
        </div>
    </div>
</section>
@endsection
