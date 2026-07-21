@php
    $settings = $settings ?? \App\Models\SiteSetting::current();
@endphp

<header x-data="{ mobileOpen: false, scrolled: false }"
        x-init="scrolled = window.scrollY > 20; window.addEventListener('scroll', () => scrolled = window.scrollY > 20)"
        class="sticky top-0 z-50">

    {{-- شريط علوي: بيانات الترخيص + سوشيال --}}
    <div class="hidden md:block bg-primary-dark text-white/90 text-xs">
        <div class="container-x py-2 flex justify-between items-center">
            <div class="flex gap-6">
                @if($settings->waqf_license_number)
                    <span><i class="fa-solid fa-certificate ms-1 text-accent"></i> ترخيص وزارة التجارة: {{ $settings->waqf_license_number }}</span>
                @endif
                <span><i class="fa-solid fa-vector-square ms-1 text-accent"></i> تكاملاً مع رؤية المملكة 2030</span>
            </div>
            <div class="flex items-center gap-4">
                @if($settings->phone)
                    <span dir="ltr"><i class="fa-solid fa-phone ms-1 text-accent"></i> {{ $settings->phone }}</span>
                @endif
                <div class="flex gap-3 border-s border-white/15 ps-4">
                    @if($settings->facebook_url)
                        <a href="{{ $settings->facebook_url }}" target="_blank" rel="noopener" class="hover:text-accent transition"><i class="fa-brands fa-facebook-f"></i></a>
                    @endif
                    @if($settings->twitter_url)
                        <a href="{{ $settings->twitter_url }}" target="_blank" rel="noopener" class="hover:text-accent transition"><i class="fa-brands fa-x-twitter"></i></a>
                    @endif
                    @if($settings->instagram_url)
                        <a href="{{ $settings->instagram_url }}" target="_blank" rel="noopener" class="hover:text-accent transition"><i class="fa-brands fa-instagram"></i></a>
                    @endif
                    @if($settings->youtube_url)
                        <a href="{{ $settings->youtube_url }}" target="_blank" rel="noopener" class="hover:text-accent transition"><i class="fa-brands fa-youtube"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- الشريط الرئيسي --}}
    <nav class="transition-all duration-300"
         :class="scrolled ? 'bg-white/95 backdrop-blur shadow-md' : 'bg-white'">
        <div class="container-x flex items-center justify-between transition-all duration-300"
             :class="scrolled ? 'py-2.5' : 'py-4'">

            <a href="{{ route('home') }}" class="flex items-center gap-3 shrink-0">
                @if($settings->logo)
                    <img src="{{ Storage::url($settings->logo) }}" alt="تكنو فاملي"
                         class="w-auto transition-all duration-300" :class="scrolled ? 'h-11' : 'h-14'">
                @else
                    <img src="{{ asset('images/logo-technofamily.png') }}" alt="تكنو فاملي - تطبيقات الأسرة"
                         class="w-auto transition-all duration-300" :class="scrolled ? 'h-11' : 'h-14'">
                @endif
            </a>

            {{-- روابط الديسكتوب --}}
            <ul class="hidden lg:flex items-center gap-8 font-semibold text-gray-700">
                <li><a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'is-active' : '' }}">الرئيسية</a></li>
                <li><a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'is-active' : '' }}">من نحن</a></li>
                <li><a href="{{ route('home') }}#value" class="nav-link">القيم</a></li>
                <li><a href="{{ route('programs.index') }}" class="nav-link {{ request()->routeIs('programs.*') ? 'is-active' : '' }}">برامجنا</a></li>
                <li><a href="{{ route('home') }}#map" class="nav-link">مراحل التأسيس</a></li>
                <li><a href="{{ route('training-bags.index') }}" class="nav-link {{ request()->routeIs('training-bags.*') ? 'is-active' : '' }}">الحقائب التدريبية</a></li>
                <li><a href="{{ route('contact.index') }}" class="nav-link {{ request()->routeIs('contact.*') ? 'is-active' : '' }}">تواصل معنا</a></li>
            </ul>

            <a href="{{ route('contact.index') }}" class="hidden lg:inline-flex items-center gap-2 bg-accent hover:bg-accent-dark text-white font-extrabold px-6 py-2.5 rounded-xl shadow-accent-glow hover:-translate-y-0.5 transition-all">
                <i class="fa-solid fa-handshake-angle"></i> كن شريكاً
            </a>

            {{-- زر قائمة الجوال --}}
            <button @click="mobileOpen = !mobileOpen" aria-label="القائمة"
                    class="lg:hidden w-11 h-11 grid place-items-center rounded-xl bg-primary/5 text-primary text-xl">
                <i class="fa-solid" :class="mobileOpen ? 'fa-xmark' : 'fa-bars'"></i>
            </button>
        </div>
    </nav>

    {{-- قائمة الجوال --}}
    <div x-show="mobileOpen" x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-3"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="lg:hidden bg-white border-t shadow-lg px-4 py-4 space-y-1 font-semibold text-gray-700">
        <a href="{{ route('home') }}" class="block py-2.5 px-3 rounded-lg hover:bg-primary/5 hover:text-secondary transition">الرئيسية</a>
        <a href="{{ route('about') }}" class="block py-2.5 px-3 rounded-lg hover:bg-primary/5 hover:text-secondary transition">من نحن</a>
        <a href="{{ route('home') }}#value" class="block py-2.5 px-3 rounded-lg hover:bg-primary/5 hover:text-secondary transition">القيم</a>
        <a href="{{ route('programs.index') }}" class="block py-2.5 px-3 rounded-lg hover:bg-primary/5 hover:text-secondary transition">برامجنا</a>
        <a href="{{ route('home') }}#map" class="block py-2.5 px-3 rounded-lg hover:bg-primary/5 hover:text-secondary transition">مراحل التأسيس</a>
        <a href="{{ route('training-bags.index') }}" class="block py-2.5 px-3 rounded-lg hover:bg-primary/5 hover:text-secondary transition">الحقائب التدريبية</a>
        <a href="{{ route('contact.index') }}" class="block py-2.5 px-3 rounded-lg hover:bg-primary/5 hover:text-secondary transition">تواصل معنا</a>
        <a href="{{ route('contact.index') }}" class="flex items-center justify-center gap-2 bg-accent hover:bg-accent-dark text-white font-extrabold px-6 py-3 rounded-xl w-full mt-2 transition">
            <i class="fa-solid fa-handshake-angle"></i> كن شريكاً
        </a>
    </div>
</header>
