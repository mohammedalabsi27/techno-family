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

        {{-- الأيقونة المركزية --}}
        <div class="order-1 lg:order-2 flex justify-center items-center" data-aos="fade-right">
            <div class="relative w-72 h-72 lg:w-96 lg:h-96">
                <div class="absolute inset-0 rounded-full bg-primary/20 blur-3xl animate-pulse"></div>
                <div class="relative w-full h-full rounded-full glass flex flex-col items-center justify-center gap-4 border border-white/20">
                    <i class="fa-solid fa-people-roof text-7xl lg:text-8xl text-white/90"></i>
                    <div class="text-center">
                        <span class="block text-accent font-black text-xl">Techno Family</span>
                        <span class="text-white/60 text-sm">المؤسسة الوقفية للتطبيقات الأسرية</span>
                    </div>
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
<section class="py-20">
    <div class="container-x grid lg:grid-cols-2 gap-14 items-center">
        <div class="relative" data-aos="fade-left">
            <div class="rounded-3xl overflow-hidden shadow-soft aspect-[4/3] bg-gradient-to-br from-primary/10 to-secondary/10 flex items-center justify-center">
                @if(file_exists(public_path('images/about.jpg')))
                    <img src="{{ asset('images/about.jpg') }}" alt="عن تكنو فاملي" class="w-full h-full object-cover">
                @else
                    <i class="fa-solid fa-laptop-code text-8xl text-primary/20"></i>
                @endif
            </div>
            <div class="absolute -bottom-6 -start-6 bg-primary-darker text-white rounded-2xl px-6 py-4 shadow-glow hidden md:block">
                <span class="block text-3xl font-black text-accent">2030</span>
                <span class="text-sm text-white/80">تكامل مع الرؤية</span>
            </div>
            <div class="absolute -top-4 -end-4 w-24 h-24 border-2 border-primary/20 rounded-2xl -z-10"></div>
        </div>

        <div data-aos="fade-right">
            <span class="section-eyebrow">من نحن</span>
            <h2 class="section-title mb-6">مؤسسة وقفية لتطبيقات الأسرة</h2>
            <p class="text-gray-600 leading-8 mb-6">
                {{ $settings->about_short ?: 'مؤسسة وقفية متخصصة في التنمية المستدامة التقنية، تعمل على مبادرات تنموية لتحقيق جودة الحياة الأسرية، من خلال تسخير التقنية بجميع مجالاتها (مواقع ومنصات وتطبيقات وألعاب) لخدمة جميع أفراد الأسرة.' }}
            </p>
            <div class="grid grid-cols-2 gap-4 mb-8">
                @foreach(['أول مؤسسة متخصصة بالمنصات الأسرية','الأصالة والتجديد في المحتوى التقني','الشمولية للأسر والعاملين معها','تكاملاً مع رؤية المملكة 2030'] as $pt)
                <div class="flex items-center gap-2 text-gray-700 text-sm">
                    <span class="w-6 h-6 shrink-0 rounded-full bg-primary/10 text-primary grid place-items-center text-xs">
                        <i class="fa-solid fa-check"></i>
                    </span>
                    {{ $pt }}
                </div>
                @endforeach
            </div>
            <a href="{{ route('about') }}" class="btn-teal btn-md inline-flex">
                اقرأ المزيد <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>
    </div>
</section>

{{-- ============ البرامج بتبويبات السنوات ============ --}}
@if($programs->isNotEmpty())
<section id="program" class="py-20 bg-gray-50 bg-dots-dark">
    <div class="container-x">
        <div class="text-center max-w-2xl mx-auto mb-10" data-aos="fade-up">
            <span class="section-eyebrow">برامجنا النوعية</span>
            <h2 class="section-title">9 برامج تقنية على 3 سنوات</h2>
            <p class="text-gray-500 mt-3">كل برنامج مصمَّم لخدمة شريحة محددة من الأسرة بأسلوب تقني مبتكر</p>
        </div>

        {{-- تبويبات السنوات --}}
        <div class="flex flex-wrap justify-center gap-3 mb-10" data-aos="fade-up">
            @foreach(['السنة الأولى','السنة الثانية','السنة الثالثة'] as $yr)
            <button class="year-tab" data-year="{{ $yr }}">
                <i class="fa-solid fa-calendar-days me-1"></i> {{ $yr }}
            </button>
            @endforeach
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($programs as $i => $program)
            <div class="program-card-wrap" data-year="{{ $program->year_label }}"
                 data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 80 }}">
                <a href="{{ route('programs.show', $program) }}"
                   class="group card card-hover overflow-hidden flex flex-col h-full">
                    <div class="relative aspect-video bg-gradient-to-br from-primary/10 to-secondary/10 overflow-hidden flex items-center justify-center">
                        @if($program->image)
                            <img src="{{ Storage::url($program->image) }}" alt="{{ $program->title }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <i class="fa-solid fa-microchip text-5xl text-primary/20"></i>
                        @endif
                        @if($program->year_label)
                        <span class="absolute top-3 end-3 pill bg-primary text-white text-xs !py-1 !px-3 shadow-glow">
                            {{ $program->year_label }}
                        </span>
                        @endif
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <h3 class="font-bold text-lg text-primary-dark group-hover:text-primary transition mb-2">
                            {{ $program->title }}
                        </h3>
                        <p class="text-gray-500 text-sm leading-6 line-clamp-2 flex-1">
                            {{ $program->short_description }}
                        </p>
                        <span class="inline-flex items-center gap-2 text-primary font-bold text-sm mt-4 group-hover:gap-3 transition-all">
                            التفاصيل <i class="fa-solid fa-arrow-left"></i>
                        </span>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ============ مخرجات المشروع ============ --}}
<section class="py-20">
    <div class="container-x">
        <div class="text-center max-w-2xl mx-auto mb-14" data-aos="fade-up">
            <span class="section-eyebrow">ما سنقدّمه</span>
            <h2 class="section-title">مخرجات المشروع</h2>
            <p class="text-gray-500 mt-3">ثمرة العمل الوقفي التقني على مدى ثلاث سنوات</p>
        </div>
        <div class="grid md:grid-cols-2 gap-6">
            @php
            $outputs = [
                ['icon'=>'fa-solid fa-building-columns', 'title'=>'مؤسسة تقنية وقفية','desc'=>'مؤسسة وقفية لأفضل الممارسات في مجال التقنية الأسرية، مرجع تقني شامل للمؤسسات العاملة في قطاع الأسرة.','gradient'=>'from-primary to-primary-dark','num'=>'01'],
                ['icon'=>'fa-solid fa-layer-group',       'title'=>'9 برامج نوعية',      'desc'=>'تسعة برامج تقنية متخصصة موزعة على ثلاث سنوات، تخدم مختلف شرائح الأسرة وتلبي احتياجاتهم.','gradient'=>'from-secondary to-secondary-dark','num'=>'02'],
                ['icon'=>'fa-solid fa-book-open-reader',  'title'=>'محتوى أسري تربوي',   'desc'=>'محتويات تربوية قيمية وتوعوية عالية الجودة، تحوّل المفاهيم الأسرية إلى تجارب تقنية تفاعلية.','gradient'=>'from-accent to-accent-dark','num'=>'03'],
                ['icon'=>'fa-solid fa-mobile-screen-button','title'=>'منصات وتطبيقات',   'desc'=>'منصات وتطبيقات تفاعلية ومهارية مبتكرة، قابلة للوصول من أي مكان وتناسب جميع الأجهزة.','gradient'=>'from-primary-dark to-primary-darker','num'=>'04'],
            ];
            @endphp
            @foreach($outputs as $out)
            <div class="group relative rounded-2xl overflow-hidden border border-gray-100 bg-white hover:shadow-soft hover:-translate-y-1 transition-all duration-300"
                 data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="flex gap-0">
                    {{-- الشريط الجانبي الملوّن --}}
                    <div class="w-2 bg-gradient-to-b {{ $out['gradient'] }} shrink-0"></div>
                    <div class="p-7 flex gap-5 items-start w-full">
                        {{-- الأيقونة --}}
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br {{ $out['gradient'] }} text-white flex items-center justify-center text-xl shrink-0 shadow-md group-hover:scale-110 transition-transform duration-300">
                            <i class="{{ $out['icon'] }}"></i>
                        </div>
                        {{-- المحتوى --}}
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-1">
                                <span class="text-[11px] font-black text-gray-300 tracking-widest">{{ $out['num'] }}</span>
                                <h3 class="font-extrabold text-gray-800 text-lg group-hover:text-primary transition-colors">{{ $out['title'] }}</h3>
                            </div>
                            <p class="text-gray-500 text-sm leading-6">{{ $out['desc'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
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

{{-- ============ الفئات المستهدفة ============ --}}
@php
$audiences = [
    ['icon'=>'fa-solid fa-people-roof',         'title'=>'الأسرة',   'tag'=>'سعادة وطمأنينة', 'color'=>'bg-primary/10 text-primary'],
    ['icon'=>'fa-solid fa-heart',               'title'=>'الزوجان',  'tag'=>'مودة ورحمة',     'color'=>'bg-rose-100 text-rose-500'],
    ['icon'=>'fa-solid fa-hands-holding-child', 'title'=>'الوالدان', 'tag'=>'تربية وبناء',    'color'=>'bg-secondary/10 text-secondary'],
    ['icon'=>'fa-solid fa-child-reaching',       'title'=>'الأطفال',  'tag'=>'إبداع وانطلاق', 'color'=>'bg-accent/10 text-accent-dark'],
    ['icon'=>'fa-solid fa-user-graduate',        'title'=>'الخبراء',  'tag'=>'خبرة وفاعلية',  'color'=>'bg-indigo-100 text-indigo-500'],
];
@endphp
<section class="py-20">
    <div class="container-x">
        <div class="text-center max-w-2xl mx-auto mb-14" data-aos="fade-up">
            <span class="section-eyebrow">لمن نعمل</span>
            <h2 class="section-title">الفئات المستهدفة</h2>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5">
            @foreach($audiences as $a)
            <div class="card card-hover p-6 text-center group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">
                <div class="w-16 h-16 mx-auto mb-4 rounded-2xl {{ $a['color'] }} grid place-items-center text-2xl group-hover:scale-110 transition-transform duration-300">
                    <i class="{{ $a['icon'] }}"></i>
                </div>
                <h3 class="font-bold text-gray-800">{{ $a['title'] }}</h3>
                <p class="text-gray-400 text-xs mt-1">{{ $a['tag'] }}</p>
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
    ['icon'=>'fa-solid fa-award',                   'title'=>'الأولى من نوعها',  'desc'=>'أول مؤسسة متخصصة بالمنصات والتطبيقات الأسرية.'],
    ['icon'=>'fa-solid fa-lightbulb',               'title'=>'الأصالة والتجديد', 'desc'=>'أصالة وتجديد في المحتوى التقني الأسري.'],
    ['icon'=>'fa-solid fa-hands-holding-circle',    'title'=>'البعد الاجتماعي',  'desc'=>'اهتمام بالجانب الاجتماعي والتطبيقي.'],
    ['icon'=>'fa-solid fa-layer-group',             'title'=>'الشمولية',          'desc'=>'شمولية للأسر والعاملين والخبراء.'],
];
@endphp
<section class="py-20">
    <div class="container-x">
        <div class="text-center max-w-2xl mx-auto mb-14" data-aos="fade-up">
            <span class="section-eyebrow">لماذا نحن</span>
            <h2 class="section-title">ما يميّز المشروع</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($features as $f)
            <div class="card card-hover p-8 text-center group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="w-16 h-16 mx-auto rounded-2xl bg-gradient-to-br from-primary/10 to-accent/10 text-primary-dark grid place-items-center text-2xl mb-5 group-hover:from-primary group-hover:to-accent group-hover:text-white transition-all duration-300">
                    <i class="{{ $f['icon'] }}"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">{{ $f['title'] }}</h3>
                <p class="text-gray-500 text-sm leading-6">{{ $f['desc'] }}</p>
            </div>
            @endforeach
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
        <div class="relative bg-gradient-to-l from-primary-dark via-primary to-primary-light rounded-3xl px-6 py-16 text-center text-white overflow-hidden" data-aos="fade-up">
            <div class="absolute inset-0 bg-dots opacity-30"></div>
            <div class="absolute -bottom-20 -start-10 w-80 h-80 bg-accent/20 rounded-full blur-3xl"></div>
            <div class="absolute -top-20 -end-10 w-60 h-60 bg-white/5 rounded-full blur-3xl"></div>
            <div class="relative max-w-2xl mx-auto">
                <i class="fa-solid fa-handshake-angle text-4xl text-accent mb-4 block"></i>
                <h2 class="text-2xl md:text-3xl font-extrabold mb-4">كن شريكاً في تسهيل التربية بالتقنية</h2>
                <p class="text-white/90 mb-8">تواصل معنا لمعرفة المزيد عن برامجنا التقنية وفرص الشراكة والدعم.</p>
                <a href="{{ route('contact.index') }}" class="btn-ghost btn-lg">
                    <i class="fa-solid fa-paper-plane"></i> تواصل معنا الآن
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
