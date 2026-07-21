@php
    $settings = $settings ?? \App\Models\SiteSetting::current();
@endphp

<footer class="relative bg-primary-darker text-white overflow-hidden">
    {{-- زخرفة خلفية --}}
    <div class="absolute inset-0 bg-dots opacity-60"></div>
    <div class="absolute -top-24 -start-24 w-80 h-80 bg-secondary/10 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-32 -end-20 w-96 h-96 bg-accent/10 rounded-full blur-3xl"></div>

    <div class="relative container-x pt-16 pb-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">

        {{-- عن المؤسسة --}}
        <div class="lg:pe-6">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-3 mb-5">
                @if($settings->logo)
                    <img src="{{ Storage::url($settings->logo) }}" alt="تكنو فاملي" class="h-14 w-auto bg-white rounded-xl p-1.5">
                @else
                    <img src="{{ asset('images/logo-technofamily.png') }}" alt="تكنو فاملي - تطبيقات الأسرة" class="h-14 w-auto bg-white rounded-xl p-1.5">
                @endif
            </a>
            <p class="text-sm text-white/70 leading-7">
                {{ $settings->about_short ?? 'المؤسسة الوقفية لتطبيقات الأسرة — مؤسسة وقفية متخصصة في التنمية المستدامة التقنية لتحقيق جودة الحياة الأسرية.' }}
            </p>
        </div>

        {{-- تصفح --}}
        <div>
            <h4 class="font-bold text-lg mb-5 relative inline-block after:content-[''] after:absolute after:-bottom-2 after:right-0 after:w-10 after:h-0.5 after:bg-accent">تصفّح</h4>
            <ul class="space-y-3 text-white/70 text-sm">
                <li><a href="{{ route('about') }}" class="inline-flex items-center gap-2 hover:text-accent hover:gap-3 transition-all"><i class="fa-solid fa-angle-left text-xs text-accent"></i> من نحن</a></li>
                <li><a href="{{ route('programs.index') }}" class="inline-flex items-center gap-2 hover:text-accent hover:gap-3 transition-all"><i class="fa-solid fa-angle-left text-xs text-accent"></i> برامجنا</a></li>
                <li><a href="{{ route('contact.index') }}" class="inline-flex items-center gap-2 hover:text-accent hover:gap-3 transition-all"><i class="fa-solid fa-angle-left text-xs text-accent"></i> تواصل معنا</a></li>
            </ul>
        </div>

        {{-- التواصل --}}
        <div>
            <h4 class="font-bold text-lg mb-5 relative inline-block after:content-[''] after:absolute after:-bottom-2 after:right-0 after:w-10 after:h-0.5 after:bg-accent">التواصل</h4>
            <ul class="space-y-4 text-white/70 text-sm">
                @if($settings->address)
                    <li class="flex items-start gap-3"><i class="fa-solid fa-location-dot mt-1 text-secondary"></i> <span>{{ $settings->address }}</span></li>
                @endif
                @if($settings->phone)
                    <li class="flex items-center gap-3"><i class="fa-solid fa-phone text-secondary"></i> <a href="tel:{{ $settings->phone }}" dir="ltr" class="hover:text-accent transition">{{ $settings->phone }}</a></li>
                @endif
                @if($settings->email)
                    <li class="flex items-center gap-3"><i class="fa-solid fa-envelope text-secondary"></i> <a href="mailto:{{ $settings->email }}" class="hover:text-accent transition break-all">{{ $settings->email }}</a></li>
                @endif
            </ul>
        </div>

        {{-- السوشيال ميديا --}}
        <div>
            <h4 class="font-bold text-lg mb-5 relative inline-block after:content-[''] after:absolute after:-bottom-2 after:right-0 after:w-10 after:h-0.5 after:bg-accent">تابعنا</h4>
            <p class="text-sm text-white/60 mb-4">كن على تواصل دائم مع جديد المؤسسة وبرامجها التقنية.</p>
            <div class="flex gap-3">
                @if($settings->facebook_url)
                    <a href="{{ $settings->facebook_url }}" target="_blank" rel="noopener" aria-label="فيسبوك" class="w-10 h-10 flex items-center justify-center rounded-xl bg-white/10 hover:bg-secondary hover:-translate-y-1 transition-all"><i class="fa-brands fa-facebook-f"></i></a>
                @endif
                @if($settings->twitter_url)
                    <a href="{{ $settings->twitter_url }}" target="_blank" rel="noopener" aria-label="إكس" class="w-10 h-10 flex items-center justify-center rounded-xl bg-white/10 hover:bg-secondary hover:-translate-y-1 transition-all"><i class="fa-brands fa-x-twitter"></i></a>
                @endif
                @if($settings->instagram_url)
                    <a href="{{ $settings->instagram_url }}" target="_blank" rel="noopener" aria-label="انستقرام" class="w-10 h-10 flex items-center justify-center rounded-xl bg-white/10 hover:bg-secondary hover:-translate-y-1 transition-all"><i class="fa-brands fa-instagram"></i></a>
                @endif
                @if($settings->youtube_url)
                    <a href="{{ $settings->youtube_url }}" target="_blank" rel="noopener" aria-label="يوتيوب" class="w-10 h-10 flex items-center justify-center rounded-xl bg-white/10 hover:bg-secondary hover:-translate-y-1 transition-all"><i class="fa-brands fa-youtube"></i></a>
                @endif
            </div>
        </div>
    </div>

    <div class="relative border-t border-white/10">
        <div class="container-x py-5 flex flex-col sm:flex-row items-center justify-between gap-3 text-sm text-white/60">
            <span>جميع الحقوق محفوظة لمؤسسة تكنو فاملي © {{ date('Y') }}</span>
            <span class="flex items-center gap-2">صُنع بعناية <i class="fa-solid fa-heart text-accent"></i></span>
        </div>
    </div>
</footer>
