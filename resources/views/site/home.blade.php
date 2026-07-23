@extends('layouts.app')

@section('title', 'تكنو فاملي | Techno Family - الرئيسية')
@section('meta_description', 'المؤسسة الوقفية لتطبيقات الأسرة — نُسخِّر التقنية لخدمة الأسرة وتحقيق جودة الحياة')

@section('content')

{{-- ============ HERO ============ --}}
<section class="hero-section">
    <div class="hero-grid-bg"></div>
    <div class="hero-floating-container absolute inset-0 overflow-hidden pointer-events-none"></div>

    {{-- زخارف دائرية --}}
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 pointer-events-none hidden lg:block">
        <div class="orbit-ring orbit-ring-1">
            <div class="orbit-dot bg-accent/80 text-white" style="transform:translateX(-50%) translateY(-50%) rotate(45deg) translate(140px) rotate(-45deg)"><i class="fa-solid fa-mobile-screen text-sm"></i></div>
        </div>
        <div class="orbit-ring orbit-ring-2">
            <div class="orbit-dot bg-primary-light/70 text-white" style="transform:translateX(-50%) translateY(-50%) rotate(120deg) translate(190px) rotate(-120deg)"><i class="fa-solid fa-people-roof text-sm"></i></div>
        </div>
        <div class="orbit-ring orbit-ring-3">
            <div class="orbit-dot bg-secondary/70 text-white" style="transform:translateX(-50%) translateY(-50%) rotate(220deg) translate(240px) rotate(-220deg)"><i class="fa-solid fa-microchip text-sm"></i></div>
        </div>
    </div>

    <div class="relative container-x py-24 grid lg:grid-cols-2 gap-14 items-center w-full">
        {{-- النص --}}
        <div class="text-white order-2 lg:order-1" data-aos="fade-left">
            <span class="pill bg-white/10 border border-white/20 text-white/90 mb-6 backdrop-blur-sm">
                <i class="fa-solid fa-certificate text-accent"></i>
                ترخيص وزارة التجارة: {{ $settings->waqf_license_number ?? '1010905271' }}
            </span>

            <h1 class="text-4xl md:text-5xl xl:text-6xl font-black leading-[1.15] mb-4">
                نُسخِّر التقنية<br>
                <span class="typewriter-wrap">
                    <span class="typewriter-text"
                          data-phrases='["لخدمة الأسرة","لتحقيق التربية","لبناء المجتمع","لرؤية 2030"]'></span><span class="typewriter-cursor"></span>
                </span>
            </h1>

            <p class="text-white/80 text-lg leading-8 mb-8 max-w-xl">
                {{ $settings->about_short ?: 'مؤسسة وقفية متخصصة في التنمية المستدامة التقنية، تعمل على تسخير التقنية بجميع مجالاتها لخدمة جميع أفراد الأسرة معرفياً ومهارياً وسلوكياً.' }}
            </p>

            <div class="flex flex-wrap gap-4">
                <a href="{{ route('programs.index') }}" class="btn-primary btn-lg">
                    <i class="fa-solid fa-layer-group"></i> تصفّح البرامج
                </a>
                <a href="{{ route('about') }}" class="btn-outline btn-lg">
                    تعرّف علينا <i class="fa-solid fa-arrow-left"></i>
                </a>
            </div>
        </div>

        {{-- موك-أب الجوال — شاشات تطبيقات تتقلّب --}}
        @php
            // صور حقيقية اختيارية: ضعها في public/images/phone/screen-1.jpg ... screen-3.jpg
            $phoneScreens = collect(range(1, 4))
                ->map(fn ($i) => "images/phone/screen-{$i}.png")
                ->filter(fn ($p) => file_exists(public_path($p)))
                ->values();
        @endphp
        <div class="order-1 lg:order-2 flex justify-center items-center" data-aos="fade-right">
            <div class="relative">
                {{-- توهّج خلف الجوال --}}
                <div class="absolute inset-0 scale-125 rounded-full bg-primary/25 blur-3xl animate-pulse pointer-events-none"></div>

                {{-- إطار الجوال --}}
                <div class="phone-mockup animate-phone-float">
                    {{-- أزرار جانبية --}}
                    <span class="phone-btn phone-btn-power"></span>
                    <span class="phone-btn phone-btn-vol-up"></span>
                    <span class="phone-btn phone-btn-vol-down"></span>

                    {{-- الشاشة --}}
                    <div class="phone-screen">
                        {{-- النوتش --}}
                        <div class="phone-notch"></div>

                        <div class="phone-slides">
                            @if($phoneScreens->isNotEmpty())
                                {{-- صور حقيقية من public/images/phone/ --}}
                                @foreach($phoneScreens as $screen)
                                    <div class="phone-slide">
                                        <img src="{{ asset($screen) }}" alt="تطبيق تكنو فاملي" class="w-full h-full object-cover">
                                    </div>
                                @endforeach
                            @else
                                {{-- شاشات تطبيقات مصغّرة (Placeholder بتصميم CSS) --}}
                                <div class="phone-slide phone-app-1">
                                    <div class="phone-app-ui">
                                        <span class="phone-app-icon"><i class="fa-solid fa-calendar-days"></i></span>
                                        <span class="phone-app-name">365 يوم تربية</span>
                                        <span class="phone-app-tag">محتوى تربوي يومي</span>
                                        <div class="phone-app-rows">
                                            <span class="phone-app-row w-4/5"></span>
                                            <span class="phone-app-row w-3/5"></span>
                                            <span class="phone-app-row w-2/3"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="phone-slide phone-app-2">
                                    <div class="phone-app-ui">
                                        <span class="phone-app-icon"><i class="fa-solid fa-gamepad"></i></span>
                                        <span class="phone-app-name">مدينة السعادة</span>
                                        <span class="phone-app-tag">لعبة أسرية تفاعلية</span>
                                        <div class="phone-app-rows">
                                            <span class="phone-app-row w-3/4"></span>
                                            <span class="phone-app-row w-1/2"></span>
                                            <span class="phone-app-row w-2/3"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="phone-slide phone-app-3">
                                    <div class="phone-app-ui">
                                        <span class="phone-app-icon"><i class="fa-solid fa-book-open"></i></span>
                                        <span class="phone-app-name">موسوعة الأسرة</span>
                                        <span class="phone-app-tag">مرجع تقني شامل</span>
                                        <div class="phone-app-rows">
                                            <span class="phone-app-row w-2/3"></span>
                                            <span class="phone-app-row w-4/5"></span>
                                            <span class="phone-app-row w-1/2"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="phone-slide phone-app-4">
                                    <div class="phone-app-ui">
                                        <span class="phone-app-icon"><i class="fa-solid fa-award"></i></span>
                                        <span class="phone-app-name">الجودة الأسرية ISFQ</span>
                                        <span class="phone-app-tag">معايير عالمية</span>
                                        <div class="phone-app-rows">
                                            <span class="phone-app-row w-3/5"></span>
                                            <span class="phone-app-row w-3/4"></span>
                                            <span class="phone-app-row w-2/5"></span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        {{-- نقاط تبديل الشاشات --}}
                        <div class="phone-dots"></div>
                    </div>
                </div>

                {{-- شارات عائمة حول الجوال --}}
                <div class="phone-float-badge phone-badge-1 hidden md:flex">
                    <i class="fa-solid fa-mobile-screen-button text-accent"></i>
                    <span>تطبيقات</span>
                </div>
                <div class="phone-float-badge phone-badge-2 hidden md:flex">
                    <i class="fa-solid fa-gamepad text-primary-light"></i>
                    <span>ألعاب</span>
                </div>
                <div class="phone-float-badge phone-badge-3 hidden md:flex">
                    <i class="fa-solid fa-globe text-secondary"></i>
                    <span>منصات</span>
                </div>
            </div>
        </div>
    </div>

    {{-- موجة أسفل الهيرو --}}
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 80" preserveAspectRatio="none" class="w-full h-16 fill-white">
            <path d="M0,40 C360,80 1080,0 1440,40 L1440,80 L0,80 Z"/>
        </svg>
    </div>
</section>

{{-- ============ شريط الإحصائيات ============ --}}
<section class="relative -mt-1 z-10 pb-6">
    <div class="container-x">
        <div class="stats-strip grid grid-cols-2 md:grid-cols-4 divide-x divide-x-reverse divide-gray-100 overflow-hidden"
             data-aos="fade-up" data-aos-delay="100">
            @php
                $stats = [
                    ['value'=>9,  'suffix'=>'',    'label'=>'برنامج نوعي',        'color'=>'text-primary'],
                    ['value'=>5,  'suffix'=>'',    'label'=>'فئات مستهدفة',       'color'=>'text-secondary'],
                    ['value'=>3,  'suffix'=>'',    'label'=>'سنوات خطة عمل',      'color'=>'text-accent-dark'],
                    ['value'=>10, 'suffix'=>'M+',  'label'=>'مستفيد مستهدف',      'color'=>'text-primary-dark'],
                ];
            @endphp
            @foreach($stats as $stat)
            <div class="p-6 md:p-8 text-center group hover:bg-gray-50 transition-colors">
                <div class="flex items-baseline justify-center gap-1">
                    <span class="counter text-3xl md:text-4xl font-black {{ $stat['color'] }}"
                          data-target="{{ $stat['value'] }}">0</span>
                    <span class="{{ $stat['color'] }} font-bold text-lg">{{ $stat['suffix'] }}</span>
                </div>
                <span class="text-gray-500 text-sm mt-1 block">{{ $stat['label'] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============ من نحن ============ --}}
<section class="py-24 relative overflow-hidden">
    {{-- زخارف خلفية ناعمة --}}
    <div class="absolute top-16 start-0 w-72 h-72 bg-primary/5 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-10 end-0 w-80 h-80 bg-accent/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative container-x grid lg:grid-cols-2 gap-16 lg:gap-20 items-center">

        {{-- ===== تكوين الصورتين المتداخلتين ===== --}}
        <div class="relative pb-16 sm:pb-20" data-aos="fade-left">
            {{-- شبكة نقطية زخرفية خلف الصورة الرئيسية --}}
            <div class="absolute -top-6 -start-6 w-44 h-44 bg-dots-dark rounded-3xl -z-10"></div>

            {{-- الصورة الرئيسية (عمودية) --}}
            <div class="relative w-[76%] rounded-[2rem] overflow-hidden shadow-soft aspect-[4/5] bg-gradient-to-br from-primary/15 to-primary/5">
                @if(file_exists(public_path('images/about-1.jpg')))
                    <img src="{{ asset('images/about-1.jpg') }}" alt="تكنو فاملي — التقنية لخدمة الأسرة"
                         class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex flex-col items-center justify-center gap-3 text-primary/25">
                        <i class="fa-solid fa-people-roof text-7xl"></i>
                        <span class="text-xs font-bold">images/about-1.jpg</span>
                    </div>
                @endif
                {{-- تدرّج خفيف أسفل الصورة --}}
                <div class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-primary-darker/40 to-transparent"></div>
            </div>

            {{-- الصورة الثانوية (مربعة، متداخلة أسفل-يسار) --}}
            <div class="absolute bottom-0 end-0 w-[52%] rounded-3xl overflow-hidden aspect-square border-[6px] border-white shadow-2xl bg-gradient-to-br from-accent/20 to-accent/5"
                 data-aos="zoom-in" data-aos-delay="150">
                @if(file_exists(public_path('images/about-2.jpg')))
                    <img src="{{ asset('images/about-2.jpg') }}" alt="تطبيقات وألعاب أسرية"
                         class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex flex-col items-center justify-center gap-2 text-accent/35">
                        <i class="fa-solid fa-mobile-screen-button text-5xl"></i>
                        <span class="text-xs font-bold">images/about-2.jpg</span>
                    </div>
                @endif
            </div>

            {{-- شارة رؤية 2030 --}}
            <div class="absolute top-8 end-2 sm:end-8 bg-primary-darker text-white rounded-2xl px-5 py-3.5 shadow-glow z-10"
                 data-aos="fade-down" data-aos-delay="250">
                <span class="block text-2xl font-black text-accent leading-none mb-1">2030</span>
                <span class="text-xs text-white/80">تكامل مع الرؤية</span>
            </div>

            {{-- شارة سنوات الخطة --}}
            <div class="absolute bottom-24 start-0 sm:-start-4 bg-white rounded-2xl px-5 py-3 shadow-soft border border-gray-100 flex items-center gap-3 z-10"
                 data-aos="fade-up" data-aos-delay="350">
                <span class="w-11 h-11 rounded-xl bg-primary/10 text-primary grid place-items-center text-lg">
                    <i class="fa-solid fa-layer-group"></i>
                </span>
                <div>
                    <span class="block text-xl font-black text-primary-dark leading-none">9 برامج</span>
                    <span class="text-xs text-gray-500">على 3 سنوات</span>
                </div>
            </div>
        </div>

        {{-- ===== النص ===== --}}
        <div data-aos="fade-right">
            <span class="section-eyebrow">من نحن</span>
            <h2 class="section-title mb-6">مؤسسة وقفية لتطبيقات الأسرة</h2>
            <p class="text-gray-600 leading-8 mb-8">
                {{ $settings->about_short ?: 'مؤسسة وقفية متخصصة في التنمية المستدامة التقنية، تعمل على مبادرات تنموية لتحقيق جودة الحياة الأسرية، من خلال تسخير التقنية بجميع مجالاتها (مواقع ومنصات وتطبيقات وألعاب) لخدمة جميع أفراد الأسرة.' }}
            </p>

            {{-- المميزات — بطاقات صغيرة --}}
            <div class="grid sm:grid-cols-2 gap-4 mb-8">
                @php
                $aboutPoints = [
                    ['icon' => 'fa-trophy',        'text' => 'أول مؤسسة متخصصة بالمنصات الأسرية'],
                    ['icon' => 'fa-lightbulb',     'text' => 'الأصالة والتجديد في المحتوى التقني'],
                    ['icon' => 'fa-people-group',  'text' => 'الشمولية للأسر والعاملين معها'],
                    ['icon' => 'fa-flag',          'text' => 'تكاملاً مع رؤية المملكة 2030'],
                ];
                @endphp
                @foreach($aboutPoints as $pt)
                <div class="flex items-center gap-3 rounded-2xl border border-gray-100 bg-white p-4 hover:border-primary/30 hover:shadow-soft transition-all duration-300">
                    <span class="w-10 h-10 shrink-0 rounded-xl bg-gradient-to-br from-primary/15 to-accent/15 text-primary grid place-items-center">
                        <i class="fa-solid {{ $pt['icon'] }}"></i>
                    </span>
                    <span class="text-gray-700 text-sm font-semibold leading-6">{{ $pt['text'] }}</span>
                </div>
                @endforeach
            </div>

            <div class="flex flex-wrap items-center gap-5">
                <a href="{{ route('about') }}" class="btn-teal btn-md inline-flex">
                    اقرأ المزيد <i class="fa-solid fa-arrow-left"></i>
                </a>
                @if($settings->waqf_license_number)
                <span class="inline-flex items-center gap-2 text-sm text-gray-500">
                    <i class="fa-solid fa-certificate text-accent"></i>
                    ترخيص وزارة التجارة: <span class="font-bold text-primary-dark" dir="ltr">{{ $settings->waqf_license_number }}</span>
                </span>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- ============ البرامج بتبويبات السنوات ============ --}}
@if($programs->isNotEmpty())
<section id="program" class="py-24 bg-white relative overflow-hidden">
    {{-- إضاءات خلفية ضبابية ناعمة (Ambient Glow) لتصميم عصري فائق النظافة --}}
    <div class="absolute top-10 start-1/4 w-96 h-96 bg-primary/8 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="absolute bottom-10 end-1/4 w-96 h-96 bg-accent/8 rounded-full blur-[100px] pointer-events-none"></div>

    <div class="container-x relative z-10">
        {{-- ترويسة القسم --}}
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6" data-aos="fade-up">
            <div>
                <span class="section-eyebrow inline-flex items-center gap-2 mb-2">
                    <span class="w-2 h-2 rounded-full bg-accent"></span>
                    برامجنا النوعية
                </span>
                <h2 class="section-title">
                    9 برامج تقنية على <span class="text-gradient-teal">3 سنوات</span>
                </h2>
            </div>
            <p class="text-gray-500 text-base max-w-md">
                مسارات تدريبية وتقنية مصممة بعناية لبناء قدرات الأسرة بأسلوب مبتكر ومستدام.
            </p>
        </div>

        {{-- تبويبات الفلترة للسنوات --}}
        <div class="flex flex-wrap items-center gap-2.5 mb-12" data-aos="fade-up">
            <button class="year-tab active" data-year="all">
                جميع البرامج
            </button>
            @foreach(['السنة الأولى','السنة الثانية','السنة الثالثة'] as $yr)
            <button class="year-tab" data-year="{{ $yr }}">
                {{ $yr }}
            </button>
            @endforeach
        </div>

        {{-- حاوية السلايدر (Swiper Container) --}}
        <div class="relative" data-aos="fade-up" data-aos-delay="100">
            <div class="programs-swiper overflow-hidden py-4 -my-4 px-2 -mx-2">
                <div class="swiper-wrapper">
                    @foreach($programs as $i => $program)
                    <div class="swiper-slide program-card-wrap h-auto" data-year="{{ $program->year_label }}">
                        
                        {{-- بطاقة نظيفة واحترافية --}}
                        <a href="{{ route('programs.show', $program) }}"
                           class="group relative block h-full bg-white rounded-2xl border border-gray-200/80 p-5 transition-all duration-300 hover:border-primary/50 hover:shadow-xl hover:-translate-y-1 flex flex-col justify-between">
                            
                            <div>
                                {{-- حاوية الصورة البسيطة --}}
                                <div class="relative aspect-[16/10] w-full rounded-xl overflow-hidden bg-gray-50 mb-5">
                                    @if($program->image)
                                        <img src="{{ Storage::url($program->image) }}" alt="{{ $program->title }}"
                                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-primary/5">
                                            <i class="fa-solid fa-microchip text-4xl text-primary/30"></i>
                                        </div>
                                    @endif

                                    {{-- شارة السنة --}}
                                    @if($program->year_label)
                                    <div class="absolute top-3 end-3 z-10">
                                        <span class="bg-primary text-white text-xs font-bold py-1 px-3 rounded-md shadow-sm">
                                            {{ $program->year_label }}
                                        </span>
                                    </div>
                                    @endif
                                </div>

                                {{-- النصوص --}}
                                <div>
                                    <h3 class="font-bold text-lg text-primary-dark group-hover:text-primary transition-colors duration-200 mb-2 line-clamp-1">
                                        {{ $program->title }}
                                    </h3>
                                    <p class="text-gray-500 text-sm leading-relaxed line-clamp-2">
                                        {{ $program->short_description }}
                                    </p>
                                </div>
                            </div>

                            {{-- تذييل البطاقة --}}
                            <div class="mt-6 pt-4 border-t border-gray-100 flex items-center justify-between text-sm font-semibold">
                                <span class="text-primary group-hover:text-accent transition-colors">
                                    عرض التفاصيل
                                </span>
                                <i class="fa-solid fa-arrow-left text-xs text-primary group-hover:-translate-x-1 transition-transform duration-300"></i>
                            </div>

                        </a>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- أدوات التحكم بالسلايدر --}}
            <div class="flex items-center justify-between mt-8 pt-4 border-t border-gray-200/60">
                <div class="programs-pagination flex items-center gap-1.5"></div>
                <div class="flex items-center gap-2.5">
                    <button class="programs-prev w-10 h-10 rounded-full bg-white border border-gray-200 text-primary-dark hover:bg-primary hover:text-white hover:border-primary transition-all duration-300 flex items-center justify-center shadow-sm cursor-pointer focus:outline-none">
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </button>
                    <button class="programs-next w-10 h-10 rounded-full bg-white border border-gray-200 text-primary-dark hover:bg-primary hover:text-white hover:border-primary transition-all duration-300 flex items-center justify-center shadow-sm cursor-pointer focus:outline-none">
                        <i class="fa-solid fa-arrow-left text-xs"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

{{-- ============ مخرجات المشروع — صورة جانبية + قائمة متصلة ============ --}}
@php
$outputs = [
    ['icon'=>'fa-solid fa-building-columns',    'title'=>'مؤسسة تقنية وقفية', 'desc'=>'مؤسسة وقفية لأفضل الممارسات في مجال التقنية الأسرية، مرجع تقني شامل للمؤسسات العاملة في قطاع الأسرة.'],
    ['icon'=>'fa-solid fa-layer-group',         'title'=>'9 برامج نوعية',      'desc'=>'تسعة برامج تقنية متخصصة موزعة على ثلاث سنوات، تخدم مختلف شرائح الأسرة وتلبي احتياجاتهم.'],
    ['icon'=>'fa-solid fa-book-open-reader',    'title'=>'محتوى أسري تربوي',   'desc'=>'محتويات تربوية قيمية وتوعوية عالية الجودة، تحوّل المفاهيم الأسرية إلى تجارب تقنية تفاعلية.'],
    ['icon'=>'fa-solid fa-mobile-screen-button','title'=>'منصات وتطبيقات',     'desc'=>'منصات وتطبيقات تفاعلية ومهارية مبتكرة، قابلة للوصول من أي مكان وتناسب جميع الأجهزة.'],
];
@endphp
<section class="py-24 relative overflow-hidden">
    <div class="absolute bottom-0 start-0 w-96 h-96 bg-accent/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative container-x grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">

        {{-- ===== المحتوى: قائمة المخرجات المتصلة ===== --}}
        <div data-aos="fade-left">
            <span class="section-eyebrow">ما سنقدّمه</span>
            <h2 class="section-title mb-4">مخرجات المشروع</h2>
            <p class="text-gray-500 leading-7 mb-10">ثمرة العمل الوقفي التقني على مدى ثلاث سنوات</p>

            <div class="relative">
                {{-- الخط الرابط --}}
                <div class="absolute top-7 bottom-7 start-7 w-px bg-gradient-to-b from-primary via-accent to-primary/20"></div>

                <div class="space-y-3">
                    @foreach($outputs as $out)
                    <div class="relative flex items-start gap-5 group rounded-2xl p-4 -ms-4 ps-4 hover:bg-gray-50 transition-colors duration-300"
                         data-aos="fade-up" data-aos-delay="{{ $loop->index * 90 }}">
                        {{-- العقدة --}}
                        <div class="relative shrink-0 z-10">
                            <div class="w-[60px] h-[60px] rounded-2xl bg-white border-2 border-primary/20 text-primary grid place-items-center text-xl shadow-sm
                                        group-hover:bg-primary group-hover:text-white group-hover:border-primary group-hover:shadow-glow transition-all duration-300">
                                <i class="{{ $out['icon'] }}"></i>
                            </div>
                            <span class="absolute -top-1.5 -end-1.5 w-6 h-6 rounded-full bg-accent text-white text-[10px] font-black grid place-items-center shadow-accent-glow">
                                {{ $loop->iteration }}
                            </span>
                        </div>
                        {{-- النص --}}
                        <div class="pt-1">
                            <h3 class="font-extrabold text-gray-800 text-lg mb-1 group-hover:text-primary transition-colors">{{ $out['title'] }}</h3>
                            <p class="text-gray-500 text-sm leading-6">{{ $out['desc'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- ===== الصورة الجانبية ===== --}}
        <div class="relative" data-aos="fade-right">
            {{-- زخرفة خلف الصورة --}}
            <div class="absolute -bottom-6 -end-6 w-48 h-48 bg-dots-dark rounded-3xl -z-10"></div>
            <div class="absolute -top-8 -start-8 w-40 h-40 rounded-full border-[14px] border-primary/10 -z-10"></div>

            <div class="relative rounded-[2.5rem] overflow-hidden shadow-soft aspect-[4/5] lg:aspect-[5/6] bg-gradient-to-br from-primary/15 to-accent/10">
                @if(file_exists(public_path('images/outputs.jpg')))
                    <img src="{{ asset('images/outputs.jpg') }}" alt="مخرجات مشروع تكنو فاملي"
                         class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex flex-col items-center justify-center gap-3 text-primary/25">
                        <i class="fa-solid fa-rocket text-7xl"></i>
                        <span class="text-xs font-bold">images/outputs.jpg</span>
                    </div>
                @endif
                {{-- تدرّج سفلي --}}
                <div class="absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-primary-darker/50 to-transparent"></div>
            </div>

            {{-- شارة عائمة: 4 مخرجات --}}
            <div class="absolute bottom-8 -start-3 sm:-start-6 bg-white rounded-2xl px-5 py-3.5 shadow-soft border border-gray-100 flex items-center gap-3 z-10"
                 data-aos="zoom-in" data-aos-delay="300">
                <span class="w-11 h-11 rounded-xl bg-accent/10 text-accent-dark grid place-items-center text-lg">
                    <i class="fa-solid fa-cubes"></i>
                </span>
                <div>
                    <span class="block text-xl font-black text-primary-dark leading-none">4 مخرجات</span>
                    <span class="text-xs text-gray-500">رئيسية للمشروع</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============ القيم — خلفية داكنة ============ --}}
@if($values->isNotEmpty())
<section id="value" class="py-20 bg-primary-darker relative overflow-hidden">
    <div class="absolute inset-0 bg-dots opacity-40"></div>
    <div class="absolute -top-20 start-1/4 w-96 h-96 bg-primary/20 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-20 end-1/4 w-72 h-72 bg-accent/10 rounded-full blur-3xl"></div>

    <div class="relative container-x">
        <div class="text-center max-w-2xl mx-auto mb-14" data-aos="fade-up">
            <span class="text-accent font-bold tracking-wide">قيمنا</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mt-2">القيم التي نؤمن بها</h2>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5">
            @foreach($values as $value)
            <div class="value-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">
                <div class="value-icon">
                    <i class="{{ $value->icon ?? 'fa-solid fa-star' }} text-white"></i>
                </div>
                <h3 class="font-bold text-white text-lg">{{ $value->title }}</h3>
                @if($value->description)
                <p class="text-white/50 text-xs leading-6 mt-2">{{ $value->description }}</p>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ============ الفئات المستهدفة — لوحات صور متمددة ============ --}}
@php
$audiences = [
    ['icon'=>'fa-solid fa-people-roof',         'title'=>'الأسرة',   'tag'=>'سعادة وطمأنينة',  'img'=>'images/audience-1.jpg', 'fallback'=>'from-primary to-primary-darker',
     'desc'=>'منصات وبرامج تجمع أفراد الأسرة على تجربة تقنية واحدة تعزز الترابط وتحقق جودة الحياة الأسرية.'],
    ['icon'=>'fa-solid fa-heart',               'title'=>'الزوجان',  'tag'=>'مودة ورحمة',      'img'=>'images/audience-2.jpg', 'fallback'=>'from-rose-400 to-primary-darker',
     'desc'=>'محتوى تفاعلي يرافق الزوجين من بداية الطريق، لبناء علاقة قائمة على الوعي والمودة والتفاهم.'],
    ['icon'=>'fa-solid fa-hands-holding-child', 'title'=>'الوالدان', 'tag'=>'تربية وبناء',     'img'=>'images/audience-3.jpg', 'fallback'=>'from-secondary to-primary-darker',
     'desc'=>'أدوات تربوية يومية تدعم الوالدين في رحلة تربية الأبناء بأساليب عصرية مبنية على المعرفة.'],
    ['icon'=>'fa-solid fa-child-reaching',      'title'=>'الأطفال',  'tag'=>'إبداع وانطلاق',   'img'=>'images/audience-4.jpg', 'fallback'=>'from-accent to-primary-darker',
     'desc'=>'ألعاب تعليمية هادفة تغرس القيم وتنمّي المهارات لدى الأطفال بأسلوب ممتع وآمن.'],
    ['icon'=>'fa-solid fa-user-graduate',       'title'=>'الخبراء',  'tag'=>'خبرة وفاعلية',    'img'=>'images/audience-5.jpg', 'fallback'=>'from-indigo-400 to-primary-darker',
     'desc'=>'منصات معرفية متخصصة تخدم الباحثين والمختصين والعاملين في المجال الأسري وتثري إنتاجهم.'],
];
@endphp
<section class="py-24 relative overflow-hidden">
    <div class="absolute top-20 end-0 w-80 h-80 bg-primary/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="container-x relative">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-12" data-aos="fade-up">
            <div>
                <span class="section-eyebrow">لمن نعمل</span>
                <h2 class="section-title">الفئات المستهدفة</h2>
            </div>
            <p class="text-gray-500 max-w-md leading-7 text-sm">
                خمس فئات تشكّل قلب عملنا — مرّر على كل لوحة لتتعرف كيف نخدمها بالتقنية.
            </p>
        </div>

        {{-- اللوحات المتمددة --}}
        <div class="flex flex-col lg:flex-row gap-3 lg:h-[520px]" x-data="{ active: 0 }" data-aos="fade-up" data-aos-delay="100">
            @foreach($audiences as $i => $a)
            <div @click="active = {{ $i }}"
                 @mouseenter="if (window.matchMedia('(min-width: 1024px)').matches) active = {{ $i }}"
                 class="relative rounded-3xl overflow-hidden cursor-pointer transition-all duration-700 ease-in-out group"
                 :class="active === {{ $i }} ? 'lg:flex-[3.2] h-[400px] lg:h-auto shadow-glow' : 'lg:flex-[1] h-20 lg:h-auto'">

                {{-- الخلفية: صورة حقيقية أو تدرّج --}}
                @if(file_exists(public_path($a['img'])))
                    <img src="{{ asset($a['img']) }}" alt="{{ $a['title'] }}"
                         class="absolute inset-0 w-full h-full object-cover transition-transform duration-700"
                         :class="active === {{ $i }} ? 'scale-100' : 'scale-110'">
                @else
                    <div class="absolute inset-0 bg-gradient-to-b {{ $a['fallback'] }}"></div>
                    <div class="absolute inset-0 bg-dots opacity-20"></div>
                    <span class="absolute top-1/3 start-1/2 -translate-x-1/2 text-white/15 text-[10px] font-bold whitespace-nowrap hidden lg:block"
                          :class="active === {{ $i }} ? 'opacity-100' : 'opacity-0'">{{ $a['img'] }}</span>
                @endif

                {{-- تعتيم متدرّج للنص --}}
                <div class="absolute inset-0 transition-all duration-700"
                     :class="active === {{ $i }}
                        ? 'bg-gradient-to-t from-primary-darker/95 via-primary-darker/35 to-transparent'
                        : 'bg-primary-darker/60'"></div>

                {{-- رقم اللوحة --}}
                <span class="absolute top-5 start-5 text-white/40 text-xs font-black tracking-widest z-10">
                    {{ sprintf('%02d', $i + 1) }}
                </span>

                {{-- حالة الانكماش: أيقونة + عنوان عمودي (ديسكتوب) / صف أفقي (موبايل) --}}
                <div class="absolute inset-0 flex items-center transition-opacity duration-500
                            max-lg:px-6 max-lg:gap-4
                            lg:flex-col lg:justify-center lg:gap-5"
                     :class="active === {{ $i }} ? 'opacity-0 pointer-events-none' : 'opacity-100'">
                    <span class="w-11 h-11 shrink-0 rounded-xl bg-white/10 border border-white/20 backdrop-blur-sm text-accent grid place-items-center text-lg">
                        <i class="{{ $a['icon'] }}"></i>
                    </span>
                    <h3 class="text-white font-extrabold text-lg lg:[writing-mode:vertical-rl] lg:tracking-wide">
                        {{ $a['title'] }}
                    </h3>
                </div>

                {{-- حالة التوسّع: المحتوى الكامل أسفل اللوحة --}}
                <div class="absolute inset-x-0 bottom-0 p-7 z-10 transition-all duration-700"
                     :class="active === {{ $i }} ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8 pointer-events-none'">
                    <span class="w-12 h-12 rounded-2xl bg-accent text-white grid place-items-center text-xl shadow-accent-glow mb-4">
                        <i class="{{ $a['icon'] }}"></i>
                    </span>
                    <div class="flex items-center gap-3 mb-2">
                        <h3 class="text-white font-black text-2xl">{{ $a['title'] }}</h3>
                        <span class="pill bg-white/10 border border-white/20 text-accent text-[11px] !py-1 !px-3">{{ $a['tag'] }}</span>
                    </div>
                    <p class="text-white/75 text-sm leading-7 max-w-sm">{{ $a['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============ مراحل التأسيس — Timeline ============ --}}
@if($roadmapItems->isNotEmpty())
<section id="map" class="py-24 overflow-hidden" style="background:linear-gradient(180deg,#f8fafc 0%,#fff 100%)">
    <div class="container-x">

        <div class="text-center max-w-2xl mx-auto mb-16" data-aos="fade-up">
            <span class="section-eyebrow">منهجية العمل</span>
            <h2 class="section-title">مراحل تأسيس المؤسسة</h2>
            <p class="text-gray-500 mt-3">خارطة طريق واضحة لبناء مؤسسة تقنية وقفية متكاملة</p>
        </div>

        {{-- ======= DESKTOP: صفوف أفقية كل 4 عناصر ======= --}}
        <div class="hidden lg:block space-y-14">
            @foreach($roadmapItems->chunk(4) as $chunkIndex => $chunk)
            <div class="relative">
                {{-- خط التايملاين الأفقي --}}
                <div class="absolute top-5 start-[12.5%] end-[12.5%] h-px bg-gradient-to-l from-accent via-primary to-primary-light opacity-40 z-0"></div>

                <div class="grid grid-cols-4 gap-4 relative z-10">
                    @foreach($chunk as $item)
                    <div class="flex flex-col items-center text-center group"
                         data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">

                        {{-- نقطة التايملاين --}}
                        <div class="relative mb-5">
                            <div class="absolute inset-0 rounded-full bg-primary/20 scale-0 group-hover:scale-[2] transition-transform duration-500 opacity-0 group-hover:opacity-100"></div>
                            <div class="relative w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center text-base shadow-glow group-hover:bg-accent transition-colors duration-300 z-10">
                                <i class="{{ $item->icon ?: 'fa-solid fa-flag' }}"></i>
                            </div>
                            <span class="absolute -top-2 -end-2 w-5 h-5 rounded-full bg-accent text-white text-[10px] font-black flex items-center justify-center">
                                {{ ($chunkIndex * 4) + $loop->iteration }}
                            </span>
                        </div>

                        {{-- بطاقة المحتوى --}}
                        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-4 w-full group-hover:shadow-soft group-hover:-translate-y-1 group-hover:border-primary/20 transition-all duration-300">
                            <h3 class="font-bold text-gray-800 text-sm leading-5 mb-1">{{ $item->title }}</h3>
                            @if($item->description)
                            <p class="text-gray-400 text-xs leading-5">{{ $item->description }}</p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>

        {{-- ======= MOBILE/TABLET: عمودية ======= --}}
        <div class="lg:hidden relative">
            <div class="absolute start-5 top-0 bottom-0 w-px bg-gradient-to-b from-primary via-accent to-primary opacity-30"></div>
            <div class="space-y-6 ps-14">
                @foreach($roadmapItems as $item)
                <div class="relative group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">
                    <div class="absolute -start-9 top-2 w-9 h-9 rounded-full bg-primary text-white flex items-center justify-center text-sm shadow-glow group-hover:bg-accent transition-colors duration-300">
                        <i class="{{ $item->icon ?: 'fa-solid fa-flag' }}"></i>
                    </div>
                    <span class="absolute -start-[50px] top-0 text-[10px] font-black text-accent">
                        {{ sprintf('%02d', $loop->iteration) }}
                    </span>
                    <div class="card p-4 group-hover:shadow-soft group-hover:-translate-y-1 transition-all duration-300">
                        <h3 class="font-bold text-gray-800 mb-1">{{ $item->title }}</h3>
                        @if($item->description)
                        <p class="text-gray-500 text-sm leading-6">{{ $item->description }}</p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</section>
@endif

{{-- ============ العوائد والأثر المتوقع ============ --}}
@if($impactItems->isNotEmpty())
<section id="effect" class="py-20 bg-primary-darker relative overflow-hidden">
    <div class="absolute inset-0 bg-dots opacity-30"></div>
    <div class="absolute top-0 start-0 w-80 h-80 bg-accent/5 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 end-0 w-80 h-80 bg-primary/20 rounded-full blur-3xl"></div>

    <div class="relative container-x">
        <div class="text-center max-w-2xl mx-auto mb-14" data-aos="fade-up">
            <span class="text-accent font-bold tracking-wide">ثمرة العمل</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mt-2">العوائد والأثر المتوقع</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($impactItems as $item)
            <div class="impact-card-new glass-dark" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="w-12 h-12 rounded-xl bg-accent/20 border border-accent/30 flex items-center justify-center mb-4">
                    <i class="fa-solid fa-circle-check text-accent text-xl"></i>
                </div>
                @if($item->label)
                <span class="impact-label">{{ $item->label }}</span>
                @endif
                <p class="text-white/70 text-sm leading-6 relative">{{ $item->title }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ============ ما يميزنا ============ --}}
@php
$features = [
    ['icon'=>'fa-solid fa-award',                   'title'=>'الأولى من نوعها',  'desc'=>'أول مؤسسة وقفية متخصصة بالمواقع والمنصات والتطبيقات والألعاب الأسرية.'],
    ['icon'=>'fa-solid fa-lightbulb',               'title'=>'الأصالة والتجديد', 'desc'=>'أصالة وتجديد في المحتوى التقني الأسري المقدَّم لكل بيت.'],
    ['icon'=>'fa-solid fa-hands-holding-circle',    'title'=>'البعد الاجتماعي',  'desc'=>'اهتمام بالجانب الاجتماعي والتطبيقي في جميع برامجنا ومنتجاتنا.'],
    ['icon'=>'fa-solid fa-layer-group',             'title'=>'الشمولية',          'desc'=>'شمولية تصل للأسر وللعاملين في المجال الأسري وللخبراء.'],
];
@endphp
<section class="py-20 relative overflow-hidden">
    <div class="absolute top-20 start-0 w-72 h-72 bg-primary/5 rounded-full blur-3xl"></div>
    <div class="absolute bottom-10 end-0 w-72 h-72 bg-accent/5 rounded-full blur-3xl"></div>

    <div class="relative container-x">
        <div class="text-center max-w-2xl mx-auto mb-16" data-aos="fade-up">
            <span class="section-eyebrow">لماذا نحن</span>
            <h2 class="section-title">ما يميّز المشروع</h2>
        </div>

        <div class="grid lg:grid-cols-[1fr_auto_1fr] gap-12 lg:gap-10 items-center">
            {{-- الميزتان الأولى والثانية --}}
            <div class="order-2 lg:order-1 space-y-12 lg:space-y-20">
                @foreach(array_slice($features, 0, 2) as $i => $f)
                <div class="group flex items-start gap-4 lg:flex-row-reverse lg:text-end" data-aos="fade-up" data-aos-delay="{{ $i * 120 }}">
                    <div class="relative shrink-0">
                        <div class="w-14 h-14 rounded-2xl bg-white shadow-soft border border-primary/10 text-primary grid place-items-center text-xl group-hover:bg-gradient-to-br group-hover:from-primary group-hover:to-accent group-hover:text-white group-hover:border-transparent group-hover:shadow-glow transition-all duration-300">
                            <i class="{{ $f['icon'] }}"></i>
                        </div>
                        <span class="absolute -top-2 -start-2 w-6 h-6 rounded-full bg-accent text-white text-[10px] font-black grid place-items-center shadow-accent-glow">{{ $i + 1 }}</span>
                    </div>
                    <div>
                        <h3 class="font-extrabold text-gray-800 text-lg mb-1.5 group-hover:text-primary transition-colors">{{ $f['title'] }}</h3>
                        <p class="text-gray-500 text-sm leading-6">{{ $f['desc'] }}</p>
                        <div class="hidden lg:block h-px w-16 mt-4 ms-auto bg-gradient-to-l from-transparent to-primary/40"></div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- الصورة الوسطية --}}
            <div class="order-1 lg:order-2 mx-auto" data-aos="zoom-in">
                <div class="relative w-64 sm:w-72 lg:w-80">
                    {{-- حلقة متقطعة تدور ببطء --}}
                    <div class="absolute -inset-5 rounded-[12rem] border-2 border-dashed border-primary/25 animate-[spin_45s_linear_infinite]"></div>
                    <div class="absolute -bottom-6 -start-8 w-28 h-28 bg-dots-dark rounded-3xl"></div>

                    <div class="relative rounded-[10rem] overflow-hidden aspect-[3/4.1] shadow-glow ring-8 ring-white">
                        @if(file_exists(public_path('images/features.jpg')))
                            <img src="{{ asset('images/features.jpg') }}" alt="ما يميز تكنو فاملي" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gradient-to-b from-primary via-primary-dark to-primary-darker relative">
                                <div class="absolute inset-0 bg-dots opacity-30"></div>
                                <div class="absolute inset-0 flex flex-col items-center justify-center gap-3 text-white/80">
                                    <i class="fa-solid fa-medal text-5xl"></i>
                                    <span class="text-xs font-bold text-white/50 ltr:font-mono" dir="ltr">images/features.jpg</span>
                                </div>
                            </div>
                        @endif
                    </div>

                    {{-- شارة عائمة --}}
                    <div class="absolute top-8 -end-4 w-14 h-14 rounded-2xl bg-accent text-white grid place-items-center text-xl shadow-accent-glow rotate-6">
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>
            </div>

            {{-- الميزتان الثالثة والرابعة --}}
            <div class="order-3 space-y-12 lg:space-y-20">
                @foreach(array_slice($features, 2, 2) as $i => $f)
                <div class="group flex items-start gap-4" data-aos="fade-up" data-aos-delay="{{ ($i + 2) * 120 }}">
                    <div class="relative shrink-0">
                        <div class="w-14 h-14 rounded-2xl bg-white shadow-soft border border-primary/10 text-primary grid place-items-center text-xl group-hover:bg-gradient-to-br group-hover:from-primary group-hover:to-accent group-hover:text-white group-hover:border-transparent group-hover:shadow-glow transition-all duration-300">
                            <i class="{{ $f['icon'] }}"></i>
                        </div>
                        <span class="absolute -top-2 -start-2 w-6 h-6 rounded-full bg-accent text-white text-[10px] font-black grid place-items-center shadow-accent-glow">{{ $i + 3 }}</span>
                    </div>
                    <div>
                        <h3 class="font-extrabold text-gray-800 text-lg mb-1.5 group-hover:text-primary transition-colors">{{ $f['title'] }}</h3>
                        <p class="text-gray-500 text-sm leading-6">{{ $f['desc'] }}</p>
                        <div class="hidden lg:block h-px w-16 mt-4 bg-gradient-to-r from-transparent to-primary/40"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ============ مرحلة الوصول للجمهور ============ --}}
<section class="py-20 bg-primary-darker relative overflow-hidden">
    <div class="absolute inset-0 bg-grid opacity-100"></div>
    <div class="absolute inset-0 bg-dots opacity-20"></div>
    <div class="absolute top-0 start-0 w-96 h-96 bg-accent/5 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 end-0 w-96 h-96 bg-primary/30 rounded-full blur-3xl"></div>

    <div class="relative container-x">
        <div class="text-center max-w-2xl mx-auto mb-16" data-aos="fade-up">
            <span class="text-accent font-bold tracking-wide">تدرّج الوصول</span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mt-2">مرحلة الوصول للجمهور</h2>
            <p class="text-white/60 mt-3">مسيرة مدروسة نحو الوصول لـ 10 مليون مستفيد</p>
        </div>

        {{-- مراحل التدرّج --}}
        <div class="grid md:grid-cols-4 gap-4 mb-16">
            @php
            $milestones = [
                ['num'=>'50K',  'label'=>'مستفيد', 'year'=>'السنة الأولى',  'color'=>'border-primary bg-primary/20',    'glow'=>'shadow-glow',        'desc'=>'الانطلاقة والتأسيس'],
                ['num'=>'1M',   'label'=>'مستفيد', 'year'=>'السنة الثانية', 'color'=>'border-secondary bg-secondary/20','glow'=>'',                  'desc'=>'التوسع والانتشار'],
                ['num'=>'1.5M', 'label'=>'مستفيد', 'year'=>'السنة الثالثة','color'=>'border-accent bg-accent/20',      'glow'=>'',                  'desc'=>'النضج والاستدامة'],
                ['num'=>'10M',  'label'=>'+',       'year'=>'المستهدف النهائي','color'=>'border-white bg-white/10',    'glow'=>'shadow-soft',        'desc'=>'لكل برنامج وتطبيق'],
            ];
            @endphp
            @foreach($milestones as $ms)
            <div class="group relative rounded-2xl border {{ $ms['color'] }} p-6 text-center hover:-translate-y-2 transition-all duration-300 {{ $ms['glow'] }}"
                 data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                {{-- رقم النجمة للأخيرة --}}
                @if($loop->last)
                <div class="absolute -top-3 start-1/2 -translate-x-1/2 bg-accent text-white text-[10px] font-black px-3 py-0.5 rounded-full whitespace-nowrap">
                    🎯 الهدف الكبير
                </div>
                @endif
                
                {{-- تم فصل الرقم النصي الكامل هنا ليظهر بشكل صحيح مباشرة دون تشويه --}}
                <span class="block text-4xl md:text-5xl font-black text-white mb-1 mt-2">
                    {{ $ms['num'] }}
                </span>
                
                <span class="block text-accent text-sm font-bold mb-3">{{ $ms['label'] }}</span>
                <div class="border-t border-white/10 pt-3">
                    <span class="block text-white/50 text-xs mb-1">{{ $ms['year'] }}</span>
                    <span class="block text-white/70 text-xs">{{ $ms['desc'] }}</span>
                </div>
            </div>
            @endforeach
        </div>

        {{-- تفاصيل كل سنة --}}
        <div class="grid md:grid-cols-3 gap-6" data-aos="fade-up">
            @php
            $yearDetails = [
                ['year'=>'السنة الأولى', 'icon'=>'fa-solid fa-seedling', 'color'=>'text-primary', 'programs'=>[
                    ['name'=>'الجودة الأسرية ISFQ',    'target'=>'500,000'],
                    ['name'=>'365 يوماً من التربية',    'target'=>'200,000'],
                    ['name'=>'رحلة عمر للمقبلين على الزواج','target'=>'50,000'],
                ]],
                ['year'=>'السنة الثانية','icon'=>'fa-solid fa-chart-line','color'=>'text-secondary','programs'=>[
                    ['name'=>'بورصة الأسرة',            'target'=>'50,000'],
                    ['name'=>'موسوعة الأسرة',          'target'=>'200,000'],
                    ['name'=>'لعبة مدينة السعادة',      'target'=>'50,000'],
                ]],
                ['year'=>'السنة الثالثة','icon'=>'fa-solid fa-rocket',  'color'=>'text-accent',   'programs'=>[
                    ['name'=>'أكاديمية الطفولة',        'target'=>'50,000'],
                    ['name'=>'أمهات المرة الأولى',      'target'=>'200,000'],
                    ['name'=>'لعبة القيم الحسنى',       'target'=>'50,000'],
                ]],
            ];
            @endphp
            @foreach($yearDetails as $yd)
            <div class="glass rounded-2xl p-6 hover:bg-white/10 transition-all duration-300">
                <div class="flex items-center gap-3 mb-5">
                    <i class="fa-solid {{ str_replace('fa-solid ','',$yd['icon']) }} {{ $yd['color'] }} text-2xl"></i>
                    <h3 class="font-extrabold text-white text-lg">{{ $yd['year'] }}</h3>
                </div>
                <ul class="space-y-3">
                    @foreach($yd['programs'] as $prog)
                    <li class="flex items-center justify-between text-sm">
                        <span class="text-white/70 flex items-center gap-2">
                            <i class="fa-solid fa-angle-left text-xs {{ $yd['color'] }}"></i>
                            {{ $prog['name'] }}
                        </span>
                        <span class="text-white font-bold text-xs bg-white/10 rounded-full px-2.5 py-0.5">{{ $prog['target'] }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============ CTA ============ --}}
<section class="py-16">
    <div class="container-x">
        <div class="relative rounded-[2.5rem] overflow-hidden bg-primary-darker shadow-glow" data-aos="fade-up">
            <div class="grid lg:grid-cols-2">
                {{-- المحتوى --}}
                <div class="relative order-2 lg:order-1 px-7 py-12 sm:px-12 lg:px-16 lg:py-20 flex flex-col justify-center">
                    <div class="absolute inset-0 bg-dots opacity-20"></div>
                    <div class="absolute -bottom-24 -start-16 w-72 h-72 bg-accent/15 rounded-full blur-3xl"></div>

                    <div class="relative">
                        <span class="inline-flex items-center gap-2 text-accent font-bold tracking-wide mb-4">
                            <i class="fa-solid fa-handshake-angle"></i> انضم إلينا
                        </span>
                        <h2 class="text-2xl md:text-3xl lg:text-4xl font-extrabold text-white leading-snug mb-4">
                            كن شريكاً في تسهيل التربية <span class="text-accent">بالتقنية</span>
                        </h2>
                        <p class="text-white/70 leading-8 mb-8 max-w-md">
                            تواصل معنا لمعرفة المزيد عن برامجنا التقنية وفرص الشراكة والدعم، ولنصل معاً بالتربية الأسرية إلى كل بيت.
                        </p>
                        <div class="flex flex-wrap items-center gap-4">
                            <a href="{{ route('contact.index') }}" class="inline-flex items-center gap-2 bg-accent hover:bg-accent-dark text-white font-bold px-7 py-3.5 rounded-xl shadow-accent-glow hover:-translate-y-0.5 transition-all duration-300">
                                <i class="fa-solid fa-paper-plane"></i> تواصل معنا الآن
                            </a>
                            <a href="{{ route('programs.index') }}" class="inline-flex items-center gap-2 border border-white/25 hover:bg-white/10 text-white font-bold px-7 py-3.5 rounded-xl transition-all duration-300">
                                <i class="fa-solid fa-rocket"></i> استكشف برامجنا
                            </a>
                        </div>
                        <div class="mt-8 pt-6 border-t border-white/10 flex items-center gap-2 text-white/50 text-xs">
                            <i class="fa-solid fa-file-shield text-accent/70"></i>
                            ترخيص وزارة التجارة: 1010905271
                        </div>
                    </div>
                </div>

                {{-- الصورة --}}
                <div class="relative order-1 lg:order-2 h-56 sm:h-72 lg:h-auto lg:min-h-[440px]">
                    @if(file_exists(public_path('images/cta.jpg')))
                        <img src="{{ asset('images/cta.jpg') }}" alt="انضم إلى تكنو فاملي" class="absolute inset-0 w-full h-full object-cover">
                    @else
                        <div class="absolute inset-0 bg-gradient-to-bl from-primary via-primary-dark to-primary-darker">
                            <div class="absolute inset-0 bg-dots opacity-30"></div>
                            <div class="absolute inset-0 flex flex-col items-center justify-center gap-3 text-white/70">
                                <i class="fa-solid fa-people-group text-6xl"></i>
                                <span class="text-xs font-bold text-white/40" dir="ltr">images/cta.jpg</span>
                            </div>
                        </div>
                    @endif
                    {{-- تدرّج يدمج الصورة مع جهة المحتوى --}}
                    <div class="absolute inset-0 bg-gradient-to-l from-primary-darker via-primary-darker/25 to-transparent hidden lg:block"></div>
                    <div class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-primary-darker to-transparent lg:hidden"></div>

                    {{-- شارة زجاجية --}}
                    <div class="absolute bottom-6 end-6 glass rounded-2xl px-5 py-3 flex items-center gap-3">
                        <span class="w-9 h-9 rounded-xl bg-accent text-white grid place-items-center text-sm shadow-accent-glow">
                            <i class="fa-solid fa-heart"></i>
                        </span>
                        <span class="text-white text-sm font-bold">معاً نصل لكل بيت</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
