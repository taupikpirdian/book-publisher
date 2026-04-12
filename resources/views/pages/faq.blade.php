@extends('layouts.app')
@section('content')
<style>
    .faq-item {
        transition: all 0.3s ease;
    }
    .faq-item:hover {
        border-color: #eab305;
    }
    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }
    .faq-answer.active {
        max-height: 500px;
    }
    .faq-icon {
        transition: transform 0.3s ease;
    }
    .faq-icon.rotate {
        transform: rotate(180deg);
    }
</style>

<!-- Hero Section -->
<section class="relative py-20 lg:py-28 overflow-hidden">
    <div class="absolute top-0 right-0 -z-10 transform translate-x-1/2 -translate-y-1/4">
        <div class="w-96 h-96 bg-brand-100 rounded-full blur-3xl opacity-50"></div>
    </div>
    <div class="absolute bottom-0 left-0 -z-10 transform -translate-x-1/2 translate-y-1/4">
        <div class="w-96 h-96 bg-yellow-100 rounded-full blur-3xl opacity-50"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="inline-block px-4 py-1.5 bg-brand-100 text-brand-700 rounded-full text-xs font-bold tracking-widest uppercase mb-6">
            Pusat Bantuan
        </span>
        <h1 class="font-serif text-4xl lg:text-5xl font-black text-brand-900 mb-6">Pertanyaan yang Sering Diajukan</h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
            Temukan jawaban untuk pertanyaan umum tentang penerbitan, royalti, dan proses kerja bersama Pustaka Aksara.
        </p>

        <!-- Search Bar -->
        <div class="mt-10 max-w-xl mx-auto">
            <div class="relative">
                <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                <input type="text" id="faq-search" placeholder="Cari pertanyaan..." class="w-full pl-12 pr-4 py-4 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-500 transition-all shadow-sm">
            </div>
        </div>
    </div>
</section>

<!-- FAQ Categories -->
<section class="py-12 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Category Tabs -->
        <div class="flex flex-wrap justify-center gap-2 mb-12">
            <button class="faq-tab active px-6 py-2.5 rounded-full text-sm font-bold transition-all bg-brand-500 text-brand-900" data-category="all">Semua</button>
            @foreach($categoryFaqs as $category)
                <button class="faq-tab px-6 py-2.5 rounded-full text-sm font-bold transition-all bg-gray-100 text-gray-600 hover:bg-brand-50" data-category="{{ Str::slug($category->name) }}">{{ $category->name }}</button>
            @endforeach
        </div>

        <!-- FAQ List -->
        <div class="space-y-4" id="faq-list">
            @forelse($faqs as $faq)
                <div class="faq-item border border-gray-200 rounded-xl overflow-hidden" data-category="{{ $faq->category ? Str::slug($faq->category->name) : 'umum' }}">
                    <button class="faq-toggle w-full flex items-center justify-between p-6 text-left bg-white hover:bg-brand-50/50 transition-colors">
                        <span class="font-bold text-brand-900 pr-4">{{ $faq->question }}</span>
                        <i data-lucide="chevron-down" class="faq-icon w-5 h-5 text-brand-500 flex-shrink-0"></i>
                    </button>
                    <div class="faq-answer bg-white">
                        <div class="px-6 pb-6 text-gray-600 leading-relaxed border-t border-gray-100 pt-4">
                            {!! nl2br(e($faq->answer)) !!}
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-12 text-gray-500">
                    <i data-lucide="help-circle" class="w-16 h-16 mx-auto mb-4 text-gray-300"></i>
                    <p class="text-lg">Belum ada FAQ yang tersedia.</p>
                </div>
            @endforelse
        </div>

        <!-- Still Have Questions -->
        <div class="mt-16 text-center">
            <div class="bg-brand-50 rounded-3xl p-8 md:p-12 border border-brand-100">
                <i data-lucide="help-circle" class="w-12 h-12 text-brand-500 mx-auto mb-6"></i>
                <h3 class="font-serif text-2xl font-bold text-brand-900 mb-4">Masih Punya Pertanyaan?</h3>
                <p class="text-gray-600 mb-8 max-w-lg mx-auto">
                    Tim kami siap membantu Anda. Jangan ragu untuk menghubungi kami melalui berbagai channel berikut.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="mailto:halo@pustakaaksara.id" class="inline-flex justify-center items-center gap-2 bg-brand-500 hover:bg-brand-700 text-brand-900 px-8 py-3.5 rounded-full font-medium transition-all shadow-lg hover:shadow-xl">
                        <i data-lucide="mail" class="w-5 h-5"></i>
                        Email Kami
                    </a>
                    <a href="{{ route('layanan') }}" class="inline-flex justify-center items-center gap-2 bg-white hover:bg-gray-50 text-brand-900 border border-brand-500 px-8 py-3.5 rounded-full font-medium transition-all shadow-sm hover:shadow">
                        <i data-lucide="message-circle" class="w-5 h-5"></i>
                        Konsultasi Gratis
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-brand-900 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 30px 30px;"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <h2 class="font-serif text-3xl md:text-4xl font-bold text-white mb-6">Siap Mewujudkan Buku Impian Anda?</h2>
        <p class="text-brand-100 text-lg mb-10 max-w-2xl mx-auto">
            Bergabunglah dengan ratusan penulis yang telah mempercayakan karya mereka kepada Pustaka Aksara.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="#" class="inline-flex justify-center items-center gap-2 bg-brand-500 hover:bg-brand-600 text-brand-900 px-8 py-4 rounded-full font-bold text-lg transition-transform hover:scale-105 shadow-xl">
                <i data-lucide="send" class="w-5 h-5"></i>
                Kirim Naskah Sekarang
            </a>
            <a href="{{ route('tentang') }}" class="inline-flex justify-center items-center gap-2 bg-transparent hover:bg-brand-800 text-white border border-brand-500 px-8 py-4 rounded-full font-medium transition-colors">
                Pelajari Lebih Lanjut
            </a>
        </div>
    </div>
</section>
@endsection

@push('script')
<script>
    // FAQ Toggle
    document.querySelectorAll('.faq-toggle').forEach(button => {
        button.addEventListener('click', () => {
            const answer = button.nextElementSibling;
            const icon = button.querySelector('.faq-icon');
            
            // Close other open FAQs
            document.querySelectorAll('.faq-answer.active').forEach(item => {
                if (item !== answer) {
                    item.classList.remove('active');
                    item.previousElementSibling.querySelector('.faq-icon').classList.remove('rotate');
                }
            });
            
            answer.classList.toggle('active');
            icon.classList.toggle('rotate');
        });
    });

    // FAQ Category Filter
    document.querySelectorAll('.faq-tab').forEach(tab => {
        tab.addEventListener('click', () => {
            // Update active tab
            document.querySelectorAll('.faq-tab').forEach(t => {
                t.classList.remove('bg-brand-500', 'text-brand-900');
                t.classList.add('bg-gray-100', 'text-gray-600');
            });
            tab.classList.remove('bg-gray-100', 'text-gray-600');
            tab.classList.add('bg-brand-500', 'text-brand-900');

            const category = tab.dataset.category;
            
            // Filter FAQ items
            document.querySelectorAll('.faq-item').forEach(item => {
                if (category === 'all' || item.dataset.category === category) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });

    // FAQ Search
    document.getElementById('faq-search').addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        
        document.querySelectorAll('.faq-item').forEach(item => {
            const question = item.querySelector('.faq-toggle span').textContent.toLowerCase();
            const answer = item.querySelector('.faq-answer').textContent.toLowerCase();
            
            if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
</script>
@endpush
