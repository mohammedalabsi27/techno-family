@extends('layouts.app')

@section('title', 'وقف التميز الأسري - الرئيسية')

@section('content')

{{-- ============ Hero Slider (Swiper) ============ --}}
@php
    // شرائح الهيرو — تعمل بأناقة مع صور أو بدونها.
    // ضع الصور في: public/images/hero/slide-1.jpg ... slide-3.jpg
    $slides = [
        [
            'image' => 'images/hero/slide-1.jpg',
            'badge' => 'وقف التميز الأسري',
            'title' => 'الحياة الأسرية من <span class="text-accent">المسؤولية</span> إلى الخيرية',
            'text'  => $settings->about_short ?: 'مؤسسة وقفية تعتني ببناء وتصميم البرامج الأسرية والتربوية والتعليمية، ويُصرف ريعها في التنمية الأسرية والقيمية والاجتماعية.',
        ],
        [
            'image' => 'images/hero/slide-2.jpg',
            'badge' => 'رؤية مستدامة',
            'title' => 'صدقة جارية <span class="text-accent">تبني</span> أسراً متماسكة',
            'text'  => 'نستثمر ريع الوقف في تقوية روابط البر والصلة بين أفراد الأسرة، والعناية بالخدمات الإنسانية في المجتمع.',
        ],
        [
            'image' => 'images/hero/slide-3.jpg',
            'badge' => 'برامج نوعية',
            'title' => 'نُصمّم <span class="text-accent">برامج</span> ترتقي بالأسرة',
            'text'  => 'برامج ومشاريع تدريبية وتأهيلية تُعنى بالاستقرار الأسري ورعاية النشء والشباب والشراكة المجتمعية.',
        ],
    ];
@endphp

<section class="relative">
    <div class="hero-swiper swiper overflow-hidden">
        <div class="swiper-wrapper">
            @foreach($slides as $slide)
                <div class="swiper-slide">
                    <div class="relative min-h-[88vh] flex items-center bg-hero-gradient">
                        {{-- صورة الخلفية إن وُجدت --}}
                        @if(file_exists(public_path($slide['image'])))
                            <img src="{{ asset($slide['image']) }}" alt="" class="absolute inset-0 w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-l from-primary-darker/95 via-primary-dark/85 to-primary/60"></div>
                        @endif

                        {{-- زخارف --}}
                        <div class="absolute inset-0 bg-dots opacity-40"></div>
                        <div class="absolute -top-24 -start-24 w-96 h-96 bg-secondary/20 rounded-full blur-3xl animate-float-slow"></div>
                        <div class="absolute -bottom-24 -end-24 w-96 h-96 bg-accent/20 rounded-full blur-3xl animate-float"></div>

                        <div class="relative container-x grid lg:grid-cols-2 gap-12 items-center py-24">
                            <div class="text-white">
                                <span class="pill bg-accent/20 text-accent mb-6">
                                    <i class="fa-solid fa-heart"></i> {{ $slide['badge'] }}
                                </span>
                                <h1 class="text-4xl md:text-6xl font-extrabold leading-[1.15] mb-6">
                                    {!! $slide['title'] !!}
                                </h1>
                                <p class="text-white/85 text-lg leading-8 mb-8 max-w-xl">
                                    {{ $slide['text'] }}
                                </p>
                                <div class="flex flex-wrap gap-4">
                                    <a href="{{ route('programs.index') }}" class="btn-primary btn-lg">
                                        <i class="fa-solid fa-layer-group"></i> تصفّح البرامج
                                    </a>
                                    <a href="{{ route('about') }}" class="btn-outline btn-lg">
                                        تعرّف علينا
                                    </a>
                                </div>
                            </div>

                            {{-- عنصر بصري --}}
                            <div class="hidden lg:flex justify-center">
                                <div class="relative">
                                    <div class="absolute inset-0 rounded-full bg-secondary/30 blur-2xl animate-pulse-ring"></div>
                                    <div class="relative aspect-square w-80 rounded-full glass flex items-center justify-center animate-float">
                                        <i class="fa-solid fa-people-roof text-[9rem] text-white/90"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="swiper-pagination !bottom-6"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>

{{-- ============ شريط إحصائي سريع ============ --}}
<section class="relative -mt-16 z-10">
    <div class="container-x">
        <div class="bg-white rounded-3xl shadow-soft border border-gray-100 grid grid-cols-2 md:grid-cols-4 divide-x divide-x-reverse divide-gray-100 overflow-hidden"
             data-aos="fade-up">
            <div class="p-6 md:p-8 text-center">
                <span class="counter block text-3xl md:text-4xl font-extrabold text-primary" data-target="{{ $programs->count() }}">0</span>
                <span class="text-gray-500 text-sm mt-1 block">برنامج ومشروع</span>
            </div>
            <div class="p-6 md:p-8 text-center">
                <span class="counter block text-3xl md:text-4xl font-extrabold text-secondary" data-target="{{ $totalBags }}">0</span>
                <span class="text-gray-500 text-sm mt-1 block">حقيبة تدريبية</span>
            </div>
            <div class="p-6 md:p-8 text-center">
                <span class="counter block text-3xl md:text-4xl font-extrabold text-accent-dark" data-target="{{ $values->count() }}">0</span>
                <span class="text-gray-500 text-sm mt-1 block">قيمة نؤمن بها</span>
            </div>
            <div class="p-6 md:p-8 text-center">
                <span class="counter block text-3xl md:text-4xl font-extrabold text-primary-dark" data-target="5">0</span>
                <span class="text-gray-500 text-sm mt-1 block">سنوات خارطة السير</span>
            </div>
        </div>
    </div>
</section>

{{-- ============ بشارة نبوية ============ --}}
<section class="py-16">
    <div class="container-x">
        <div class="relative max-w-4xl mx-auto text-center bg-secondary/5 border border-secondary/10 rounded-3xl px-6 py-12" data-aos="zoom-in">
            <i class="fa-solid fa-quote-right text-4xl text-secondary/60 mb-5"></i>
            <p class="text-xl md:text-2xl font-semibold text-primary-dark leading-relaxed">
                «إذا مات ابن آدم انقطع عمله إلا من ثلاث: صدقة جارية، أو علم يُنتفع به، أو ولد صالح يدعو له»
            </p>
            <span class="block mt-4 text-gray-500">رواه مسلم</span>
        </div>
    </div>
</section>

{{-- ============ نبذة عن الوقف ============ --}}
<section class="py-20">
    <div class="container-x grid lg:grid-cols-2 gap-14 items-center">
        <div class="relative" data-aos="fade-left">
            <div class="rounded-3xl overflow-hidden shadow-soft aspect-[4/3] bg-gradient-to-br from-primary/10 to-secondary/10 flex items-center justify-center">
                @if(file_exists(public_path('images/about.jpg')))
                    <img src="{{ asset('images/about.jpg') }}" alt="عن الوقف" class="w-full h-full object-cover">
                @else
                    <i class="fa-solid fa-mosque text-8xl text-primary/30"></i>
                @endif
            </div>
            <div class="absolute -bottom-6 -start-6 bg-accent text-white rounded-2xl px-6 py-4 shadow-accent-glow hidden md:block">
                <span class="block text-3xl font-extrabold counter" data-target="{{ $programs->count() }}">0</span>
                <span class="text-sm">برامج رئيسية</span>
            </div>
        </div>
        <div data-aos="fade-right">
            <span class="section-eyebrow">من نحن</span>
            <h2 class="section-title mb-6">قيم وقف التميز الأسري</h2>
            <p class="text-gray-600 leading-8 mb-6">
                وقف التميز الأسري يُصرف ريعه في التنمية الأسرية والقيمية والتعليمية والثقافية والاجتماعية، لتقوية روابط البر والصلة بين أفراد الأسرة، والعناية بالخدمات الإنسانية في المجتمع.
            </p>
            <ul class="space-y-3 mb-8">
                @foreach(['بناء وتصميم برامج أسرية نوعية', 'استدامة الأثر عبر ريع الوقف', 'شراكات مجتمعية فاعلة'] as $point)
                    <li class="flex items-center gap-3 text-gray-700">
                        <span class="w-6 h-6 shrink-0 rounded-full bg-secondary/15 text-secondary grid place-items-center text-xs"><i class="fa-solid fa-check"></i></span>
                        {{ $point }}
                    </li>
                @endforeach
            </ul>
            <a href="{{ route('about') }}" class="inline-flex items-center gap-2 text-primary font-bold hover:text-secondary hover:gap-3 transition-all">
                قراءة المزيد <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>
    </div>
</section>

{{-- ============ القيم ============ --}}
@if($values->isNotEmpty())
<section id="value" class="py-20 bg-gray-50">
    <div class="container-x">
        <div class="text-center max-w-2xl mx-auto mb-14" data-aos="fade-up">
            <span class="section-eyebrow">قيمنا</span>
            <h2 class="section-title">القيم التي نؤمن بها</h2>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            @foreach($values as $value)
                <div class="card card-hover p-6 text-center group"
                     data-aos="fade-up" data-aos-delay="{{ $loop->index * 40 }}">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-2xl bg-primary/10 text-primary grid place-items-center text-2xl group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                        <i class="{{ $value->icon ?? 'fa-solid fa-star' }}"></i>
                    </div>
                    <h3 class="font-bold text-gray-800">{{ $value->title }}</h3>
                    @if($value->description)
                        <p class="text-gray-500 text-xs leading-6 mt-2 line-clamp-3">{{ $value->description }}</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ============ البرامج (شريط متحرك / كاروسيل) ============ --}}
@if($programs->isNotEmpty())
<section id="program" class="py-20">
    <div class="container-x">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-14" data-aos="fade-up">
            <div class="max-w-2xl">
                <span class="section-eyebrow">برامجنا</span>
                <h2 class="section-title">البرامج ومشاريع الوقف</h2>
                <p class="text-gray-500 mt-3">برامج ومشاريع الوقف التي تحتاج بناءً وتصميماً لخدمة الأسرة والمجتمع.</p>
            </div>
            <div class="flex items-center gap-3 shrink-0">
                {{-- أزرار التنقّل --}}
                <button class="programs-prev w-11 h-11 grid place-items-center rounded-full border-2 border-primary/20 text-primary hover:bg-primary hover:text-white hover:border-primary transition" aria-label="السابق">
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
                <button class="programs-next w-11 h-11 grid place-items-center rounded-full border-2 border-primary/20 text-primary hover:bg-primary hover:text-white hover:border-primary transition" aria-label="التالي">
                    <i class="fa-solid fa-arrow-left"></i>
                </button>
            </div>
        </div>

        <div class="programs-swiper swiper overflow-hidden !py-2" data-aos="fade-up">
            <div class="swiper-wrapper">
                @foreach($programs as $program)
                    <div class="swiper-slide h-auto">
                        <a href="{{ route('programs.show', $program) }}"
                           class="group card card-hover overflow-hidden flex flex-col h-full">
                            <div class="aspect-video bg-gradient-to-br from-primary/10 to-secondary/10 flex items-center justify-center overflow-hidden">
                                @if($program->image)
                                    <img src="{{ Storage::url($program->image) }}" alt="{{ $program->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <i class="fa-solid fa-hands-holding-child text-5xl text-primary/30"></i>
                                @endif
                            </div>
                            <div class="p-6 flex flex-col flex-1">
                                <h3 class="font-bold text-lg text-primary-dark group-hover:text-secondary transition mb-2">{{ $program->title }}</h3>
                                <p class="text-gray-500 text-sm leading-6 line-clamp-2 flex-1">{{ $program->short_description }}</p>
                                <span class="inline-flex items-center gap-2 text-accent-dark font-bold text-sm mt-4 group-hover:gap-3 transition-all">
                                    التفاصيل <i class="fa-solid fa-arrow-left"></i>
                                </span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="programs-pagination flex justify-center gap-2 mt-8"></div>
        </div>

        <div class="text-center mt-6">
            <a href="{{ route('programs.index') }}" class="inline-flex items-center gap-2 text-primary font-bold hover:text-secondary hover:gap-3 transition-all">
                كل البرامج <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>
    </div>
</section>
@endif

{{-- ============ خارطة السير ============ --}}
@if($roadmapItems->isNotEmpty())
<section id="map" class="py-24 bg-primary-dark text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-dots opacity-50"></div>
    <div class="absolute -top-20 start-1/3 w-72 h-72 bg-secondary/10 rounded-full blur-3xl"></div>
    <div class="relative container-x">
        <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
            <span class="text-accent font-bold">رؤيتنا المستقبلية</span>
            <h2 class="text-3xl md:text-4xl font-extrabold mt-2">خارطة سير الوقف خلال السنوات الخمس</h2>
        </div>

        <div class="grid lg:grid-cols-12 gap-10 items-center">

            {{-- صورة الكعبة --}}
            <div class="lg:col-span-4 relative" data-aos="fade-left">
                <div class="relative rounded-3xl overflow-hidden shadow-[0_25px_60px_-15px_rgba(0,0,0,0.5)] group">
                    <img src="{{ asset('images/kaba.jpg') }}" alt="الكعبة المشرفة"
                         class="w-full aspect-[4/5] object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-primary-darker/80 via-transparent to-transparent"></div>
                    {{-- إطار داخلي --}}
                    <div class="absolute inset-3 rounded-2xl border border-white/25 pointer-events-none"></div>
                    <div class="absolute bottom-6 inset-x-6 text-center">
                        <span class="block h-1 w-12 bg-accent rounded-full mx-auto mb-3"></span>
                        <p class="font-extrabold text-lg text-white leading-8">وقفٌ يمتد أثره بإذن الله</p>
                    </div>
                </div>
                {{-- زخارف --}}
                <div class="absolute -top-5 -start-5 w-24 h-24 border-2 border-accent/40 rounded-3xl -z-10"></div>
                <div class="absolute -bottom-6 -end-6 w-32 h-32 bg-secondary/15 rounded-full blur-2xl"></div>
            </div>

            {{-- بطاقات المراحل --}}
            <div class="lg:col-span-8 grid sm:grid-cols-2 xl:grid-cols-3 gap-5">
                @foreach($roadmapItems as $item)
                    <div class="group {{ $loop->last && $loop->count % 3 === 1 ? 'xl:col-start-2' : '' }}"
                         data-aos="fade-up" data-aos-delay="{{ $loop->index * 40 }}">
                        <div class="glass rounded-2xl p-5 h-full text-center hover:bg-white/15 transition-all duration-300 group-hover:-translate-y-2">
                            <span class="mx-auto w-14 h-14 flex items-center justify-center rounded-2xl bg-accent text-primary-dark text-2xl mb-4 shadow-accent-glow group-hover:scale-110 transition-transform duration-300">
                                <i class="{{ $item->icon ?: 'fa-solid fa-flag' }}"></i>
                            </span>
                            @if($item->year_label)
                                <h4 class="font-bold text-secondary text-xs mb-1">{{ $item->year_label }}</h4>
                            @endif
                            <p class="font-extrabold leading-6 text-white">{{ $item->title }}</p>
                            @if($item->description)
                                <p class="text-white/60 text-xs leading-6 mt-2">{{ $item->description }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif

{{-- ============ الأثر المتوقع (سلايدر 3D) ============ --}}
@if($impactItems->isNotEmpty())
<section id="effect" class="py-20 bg-gray-50 overflow-hidden">
    <div class="container-x">
        <div class="text-center max-w-2xl mx-auto mb-12" data-aos="fade-up">
            <span class="section-eyebrow">ثمرة العمل</span>
            <h2 class="section-title">الأثر المتوقع</h2>
        </div>
    </div>

    <div class="relative" data-aos="zoom-in-up">
        <div class="swiper impact-swiper !overflow-visible max-w-6xl mx-auto px-4">
            <div class="swiper-wrapper">
                @foreach($impactItems as $item)
                    <div class="swiper-slide impact-slide">
                        <div class="impact-card group relative aspect-[3/4] sm:aspect-[4/5] rounded-3xl overflow-hidden shadow-soft">
                            @if($item->image)
                                <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}"
                                     class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            @else
                                <div class="absolute inset-0 bg-hero-gradient flex items-center justify-center">
                                    <i class="fa-solid fa-seedling text-7xl text-white/25"></i>
                                </div>
                            @endif
                            {{-- تدرّج داكن أسفل البطاقة --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-primary-darker/95 via-primary-darker/25 to-transparent"></div>

                            {{-- شارة رقم --}}
                            <span class="absolute top-5 start-5 w-11 h-11 rounded-full glass text-white grid place-items-center font-extrabold">
                                {{ sprintf('%02d', $loop->iteration) }}
                            </span>
                            <span class="absolute top-5 end-5 w-11 h-11 rounded-full bg-accent text-white grid place-items-center text-lg shadow-accent-glow">
                                <i class="fa-solid fa-circle-check"></i>
                            </span>

                            {{-- العنوان --}}
                            <div class="absolute inset-x-0 bottom-0 p-6 text-white">
                                <span class="block h-1 w-10 bg-accent rounded-full mb-3"></span>
                                <p class="font-extrabold text-lg leading-8">{{ $item->title }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- التنقّل + النقاط --}}
        <div class="flex items-center justify-center gap-6 mt-10">
            <button class="impact-prev w-12 h-12 rounded-full bg-white border border-gray-200 text-primary shadow-sm hover:bg-primary hover:text-white hover:border-primary transition grid place-items-center" aria-label="السابق">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
            <div class="impact-pagination flex items-center gap-2"></div>
            <button class="impact-next w-12 h-12 rounded-full bg-white border border-gray-200 text-primary shadow-sm hover:bg-primary hover:text-white hover:border-primary transition grid place-items-center" aria-label="التالي">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
        </div>
    </div>
</section>
@endif

{{-- ============ الحقائب التدريبية ============ --}}
@if($trainingCategories->isNotEmpty())
<section class="py-20">
    <div class="container-x">
        <div class="text-center max-w-2xl mx-auto mb-12" data-aos="fade-up">
            <span class="section-eyebrow">مكتبة المعرفة</span>
            <h2 class="section-title">الحقائب التدريبية</h2>
        </div>

        <div class="relative bg-hero-gradient rounded-3xl p-10 md:p-14 text-center text-white mb-10 overflow-hidden" data-aos="zoom-in">
            <div class="absolute inset-0 bg-dots opacity-40"></div>
            <div class="absolute -top-16 -end-16 w-64 h-64 bg-accent/20 rounded-full blur-3xl"></div>
            <div class="relative">
                <span class="counter text-5xl md:text-6xl font-extrabold text-accent" data-target="{{ $totalBags }}">0</span>
                <p class="text-xl mt-2 text-white/90">حقيبة تدريبية جاهزة</p>
                <a href="{{ route('training-bags.index') }}" class="btn-ghost btn-md mt-6">تصفّح الحقائب <i class="fa-solid fa-arrow-left"></i></a>
            </div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            @foreach($trainingCategories as $category)
                <a href="{{ route('training-bags.index', ['category' => $category->slug]) }}"
                   class="text-center card card-hover p-6 group"
                   data-aos="fade-up" data-aos-delay="{{ $loop->index * 40 }}">
                    <span class="block text-3xl font-extrabold text-secondary counter" data-target="{{ $category->bags_count }}">0</span>
                    <span class="text-gray-600 font-semibold group-hover:text-primary transition">{{ $category->name }}</span>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ============ CTA تواصل ============ --}}
<section class="py-16">
    <div class="container-x">
        <div class="relative bg-gradient-to-l from-secondary to-primary rounded-3xl px-6 py-14 text-center text-white overflow-hidden" data-aos="fade-up">
            <div class="absolute inset-0 bg-dots opacity-30"></div>
            <div class="absolute -bottom-20 -start-10 w-72 h-72 bg-accent/20 rounded-full blur-3xl"></div>
            <div class="relative max-w-2xl mx-auto">
                <h2 class="text-2xl md:text-3xl font-extrabold mb-4">كن جزءاً من رحلة بناء الأسرة</h2>
                <p class="text-white/90 mb-8">تواصل معنا لمعرفة المزيد عن برامجنا وفرص الشراكة والدعم.</p>
                <a href="{{ route('contact.index') }}" class="btn-ghost btn-lg">
                    <i class="fa-solid fa-paper-plane"></i> تواصل معنا الآن
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
