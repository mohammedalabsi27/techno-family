{{--
    ترويسة صفحة داخلية موحّدة.
    المتغيّرات: $badge (اختياري), $title, $breadcrumb (اختياري: مصفوفة ['label' => url|null]),
                $image (اختياري: مسار صورة خلفية داخل public مثل 'images/headers/about.jpg')
--}}
@php
    $headerImage = !empty($image) && file_exists(public_path($image)) ? asset($image) : null;
@endphp
<section class="relative bg-hero-gradient text-white overflow-hidden">
    @if($headerImage)
        <div class="absolute inset-0">
            <img src="{{ $headerImage }}" alt="" class="w-full h-full object-cover">
            {{-- تظليل بألوان الهوية للحفاظ على وضوح النص --}}
            <div class="absolute inset-0 bg-primary-darker/60"></div>
            <div class="absolute inset-0 bg-hero-gradient opacity-50"></div>
        </div>
    @endif
    <div class="absolute inset-0 bg-dots opacity-40"></div>
    <div class="absolute -top-16 -end-16 w-72 h-72 bg-secondary/20 rounded-full blur-3xl animate-float-slow"></div>
    <div class="absolute -bottom-20 -start-20 w-80 h-80 bg-accent/15 rounded-full blur-3xl animate-float"></div>

    <div class="relative container-x py-20 md:py-24 text-center" data-aos="fade-up">
        @if(!empty($badge))
            <span class="pill bg-accent/20 text-accent mb-4">{{ $badge }}</span>
        @endif
        <h1 class="text-4xl md:text-5xl font-extrabold">{{ $title }}</h1>

        @if(!empty($breadcrumb))
            <nav class="mt-5 flex items-center justify-center gap-2 text-sm text-white/70">
                <a href="{{ route('home') }}" class="hover:text-accent transition">الرئيسية</a>
                @foreach($breadcrumb as $label => $url)
                    <i class="fa-solid fa-angle-left text-xs"></i>
                    @if($url)
                        <a href="{{ $url }}" class="hover:text-accent transition">{{ $label }}</a>
                    @else
                        <span class="text-white">{{ $label }}</span>
                    @endif
                @endforeach
            </nav>
        @endif
    </div>
</section>
