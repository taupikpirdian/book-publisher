<!-- Footer -->
<footer class="bg-paper pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
            <!-- Brand Info -->
            <div class="lg:col-span-1">
                <div class="flex items-center gap-2 mb-6">
                    @if($settings && $settings->logo_url)
                        <img src="{{ $settings->logo_url }}" alt="{{ $settings->site_name ?? 'Pustaka Aksara' }}" class="h-6 w-auto">
                    @else
                        <i data-lucide="book-open" class="h-6 w-6 text-brand-700"></i>
                    @endif
                    <span class="font-serif font-bold text-xl text-brand-900">{{ $settings->site_name ?? 'Pustaka Aksara' }}</span>
                </div>
                @if($settings && $settings->footer_description)
                <p class="text-gray-500 text-sm mb-6 leading-relaxed">
                    {{ Str::limit(strip_tags($settings->footer_description), 150) }}
                </p>
                @elseif($footerData && $footerData->description)
                <p class="text-gray-500 text-sm mb-6 leading-relaxed">
                    {{ Str::limit(strip_tags($footerData->description), 150) }}
                </p>
                @else
                <p class="text-gray-500 text-sm mb-6 leading-relaxed">
                    Menerbitkan karya literatur berkualitas yang menginspirasi, mendidik, dan menghibur pembaca di seluruh Indonesia.
                </p>
                @endif
                @if($settings && $settings->show_social_media)
                <div class="flex space-x-4 text-gray-400">
                    @if($settings->social_instagram)
                    <a href="{{ $settings->social_instagram }}" target="_blank" class="hover:text-brand-700 transition-colors"><i data-lucide="instagram" class="w-5 h-5"></i></a>
                    @endif
                    @if($settings->social_twitter)
                    <a href="{{ $settings->social_twitter }}" target="_blank" class="hover:text-brand-700 transition-colors"><i data-lucide="twitter" class="w-5 h-5"></i></a>
                    @endif
                    @if($settings->social_facebook)
                    <a href="{{ $settings->social_facebook }}" target="_blank" class="hover:text-brand-700 transition-colors"><i data-lucide="facebook" class="w-5 h-5"></i></a>
                    @endif
                    @if($settings->social_linkedin)
                    <a href="{{ $settings->social_linkedin }}" target="_blank" class="hover:text-brand-700 transition-colors"><i data-lucide="linkedin" class="w-5 h-5"></i></a>
                    @endif
                </div>
                @endif
            </div>

            <!-- Links 1 -->
            <div>
                <h4 class="font-bold text-ink mb-4">Penerbitan</h4>
                <ul class="space-y-3 text-sm text-gray-500">
                    <li><a href="{{ route('layanan') }}" class="hover:text-brand-700 transition-colors">Layanan Penulis</a></li>
                    <li><a href="{{ route('faq') }}" class="hover:text-brand-700 transition-colors">FAQ Penulis</a></li>
                </ul>
            </div>

            <!-- Links 2 -->
            <div>
                <h4 class="font-bold text-ink mb-4">Jelajahi</h4>
                <ul class="space-y-3 text-sm text-gray-500">
                    <li><a href="{{ route('koleksi') }}" class="hover:text-brand-700 transition-colors">Katalog Buku</a></li>
                    <li><a href="{{ route('tentang') }}" class="hover:text-brand-700 transition-colors">Tentang Kami</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="font-bold text-ink mb-4">Hubungi Kami</h4>
                <ul class="space-y-4 text-sm text-gray-500">
                    @if($settings && $settings->contact_address)
                    <li class="flex items-start gap-3">
                        <i data-lucide="map-pin" class="w-5 h-5 text-brand-700 flex-shrink-0"></i>
                        <span>{{ $settings->contact_address }}</span>
                    </li>
                    @elseif($footerData && $footerData->contact_address)
                    <li class="flex items-start gap-3">
                        <i data-lucide="map-pin" class="w-5 h-5 text-brand-700 flex-shrink-0"></i>
                        <span>{{ $footerData->contact_address }}</span>
                    </li>
                    @endif

                    @if($settings && $settings->contact_email)
                    <li class="flex items-center gap-3">
                        <i data-lucide="mail" class="w-5 h-5 text-brand-700 flex-shrink-0"></i>
                        <a href="mailto:{{ $settings->contact_email }}" class="hover:text-brand-700">{{ $settings->contact_email }}</a>
                    </li>
                    @elseif($footerData && $footerData->contact_email)
                    <li class="flex items-center gap-3">
                        <i data-lucide="mail" class="w-5 h-5 text-brand-700 flex-shrink-0"></i>
                        <a href="mailto:{{ $footerData->contact_email }}" class="hover:text-brand-700">{{ $footerData->contact_email }}</a>
                    </li>
                    @endif

                    @if($settings && $settings->contact_phone)
                    <li class="flex items-center gap-3">
                        <i data-lucide="phone" class="w-5 h-5 text-brand-700 flex-shrink-0"></i>
                        <span>{{ $settings->contact_phone }}</span>
                    </li>
                    @elseif($footerData && $footerData->contact_phone)
                    <li class="flex items-center gap-3">
                        <i data-lucide="phone" class="w-5 h-5 text-brand-700 flex-shrink-0"></i>
                        <span>{{ $footerData->contact_phone }}</span>
                    </li>
                    @endif
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-200 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-sm text-gray-400">
                &copy; {{ date('Y') }} {{ $settings->site_name ?? 'Pustaka Aksara' }}. Hak cipta dilindungi undang-undang.
            </p>
            <div class="flex gap-4 text-sm text-gray-400">
                <a href="#" class="hover:text-brand-700 transition-colors">Kebijakan Privasi</a>
                <a href="#" class="hover:text-brand-700 transition-colors">Syarat & Ketentuan</a>
            </div>
        </div>
    </div>
</footer>