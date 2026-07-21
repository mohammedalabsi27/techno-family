@extends('layouts.app')

@section('title', 'من نحن - وقف التميز الأسري')

@section('content')

@include('site.partials.page-header', [
    'badge' => 'من نحن',
    'title' => 'تعرّف على وقف التميز الأسري',
    'breadcrumb' => ['من نحن' => null],
    'image' => 'images/headers/about.jpg',
])

{{-- ============ نبذة ============ --}}
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
        </div>
        <div data-aos="fade-right">
            <span class="section-eyebrow">مؤسسة وقفية</span>
            <h2 class="section-title mb-6">وقف يعتني بالأسرة وبنائها</h2>
            <p class="text-gray-600 leading-8 mb-4">
                {{ $settings->about_short ?: 'وقف التميز الأسري مؤسسة وقفية تُعنى ببناء وتصميم البرامج الأسرية والتربوية والتعليمية والثقافية والاجتماعية.' }}
            </p>
            <p class="text-gray-600 leading-8">
                يُصرف ريع الوقف في التنمية الأسرية والقيمية لتقوية روابط البر والصلة بين أفراد الأسرة، والعناية بالخدمات الإنسانية في المجتمع.
            </p>
        </div>
    </div>
</section>

{{-- ============ الرؤية والرسالة ============ --}}
<section class="py-20 bg-gray-50">
    <div class="container-x grid md:grid-cols-2 gap-8">
        <div class="relative bg-white border border-gray-100 rounded-3xl p-10 shadow-sm hover:shadow-soft transition-all duration-300 overflow-hidden group" data-aos="fade-up">
            <div class="absolute -top-10 -end-10 w-40 h-40 bg-primary/5 rounded-full group-hover:scale-125 transition-transform duration-500"></div>
            <div class="relative">
                <div class="w-14 h-14 rounded-2xl bg-primary text-white grid place-items-center text-xl mb-6 shadow-soft">
                    <i class="fa-solid fa-eye"></i>
                </div>
                <h2 class="text-2xl font-extrabold text-primary-dark mb-4">رؤيتنا</h2>
                <p class="text-gray-600 leading-8">{{ $settings->vision ?: 'أسرة متماسكة ومجتمع متكافل ترتقي به قيم البر والتنمية المستدامة.' }}</p>
            </div>
        </div>
        <div class="relative bg-white border border-gray-100 rounded-3xl p-10 shadow-sm hover:shadow-soft transition-all duration-300 overflow-hidden group" data-aos="fade-up" data-aos-delay="120">
            <div class="absolute -top-10 -end-10 w-40 h-40 bg-secondary/5 rounded-full group-hover:scale-125 transition-transform duration-500"></div>
            <div class="relative">
                <div class="w-14 h-14 rounded-2xl bg-secondary text-white grid place-items-center text-xl mb-6 shadow-soft">
                    <i class="fa-solid fa-bullseye"></i>
                </div>
                <h2 class="text-2xl font-extrabold text-primary-dark mb-4">رسالتنا</h2>
                <p class="text-gray-600 leading-8">{{ $settings->mission ?: 'بناء وتصميم برامج أسرية نوعية مستدامة، وتقديم خدمات تنموية تُعزّز استقرار الأسرة.' }}</p>
            </div>
        </div>
    </div>
</section>

{{-- ============ الأهداف ============ --}}
<section class="py-20">
    <div class="container-x">
        <div class="text-center max-w-2xl mx-auto mb-14" data-aos="fade-up">
            <span class="section-eyebrow">غايتنا</span>
            <h2 class="section-title">أهداف الوقف</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
                $goals = [
                    ['icon' => 'fa-house-user', 'title' => 'استقرار الأسرة', 'desc' => 'تعزيز التماسك الأسري وروابط البر والصلة.'],
                    ['icon' => 'fa-graduation-cap', 'title' => 'التأهيل والتدريب', 'desc' => 'برامج تدريبية نوعية لبناء المهارات.'],
                    ['icon' => 'fa-hands-holding-child', 'title' => 'رعاية النشء والشباب', 'desc' => 'العناية بالجيل الناشئ وتنشئته القيمية.'],
                    ['icon' => 'fa-handshake-angle', 'title' => 'الشراكة المجتمعية', 'desc' => 'شراكات فاعلة لخدمة المجتمع.'],
                ];
            @endphp
            @foreach($goals as $goal)
                <div class="card card-hover p-8 text-center group"
                     data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                    <div class="w-16 h-16 mx-auto rounded-2xl bg-accent/15 text-accent-dark grid place-items-center text-2xl mb-5 group-hover:bg-accent group-hover:text-white transition-colors duration-300">
                        <i class="fa-solid {{ $goal['icon'] }}"></i>
                    </div>
                    <h3 class="font-bold text-gray-800 mb-2">{{ $goal['title'] }}</h3>
                    <p class="text-gray-500 text-sm leading-6">{{ $goal['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============ الفيديو التعريفي ============ --}}
@if($settings->intro_video_url)
    @php
        preg_match('/(?:v=|youtu\.be\/|embed\/)([a-zA-Z0-9_-]+)/', $settings->intro_video_url, $m);
        $videoId = $m[1] ?? null;
    @endphp
    @if($videoId)
    <section class="py-20 bg-gray-50">
        <div class="container-x">
            <div class="text-center max-w-2xl mx-auto mb-10" data-aos="fade-up">
                <span class="section-eyebrow">شاهد</span>
                <h2 class="section-title">الفيديو التعريفي</h2>
            </div>
            <div class="max-w-4xl mx-auto rounded-3xl overflow-hidden shadow-soft aspect-video" data-aos="zoom-in">
                <iframe class="w-full h-full" src="https://www.youtube.com/embed/{{ $videoId }}" title="الفيديو التعريفي" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </section>
    @endif
@endif

{{-- ============ CTA ============ --}}
<section class="py-16">
    <div class="container-x">
        <div class="relative bg-gradient-to-l from-secondary to-primary rounded-3xl px-6 py-14 text-center text-white overflow-hidden" data-aos="fade-up">
            <div class="absolute inset-0 bg-dots opacity-30"></div>
            <div class="relative max-w-2xl mx-auto">
                <h2 class="text-2xl md:text-3xl font-extrabold mb-4">هل ترغب بمعرفة المزيد؟</h2>
                <p class="text-white/90 mb-8">تصفّح برامجنا أو تواصل معنا لأي استفسار أو فرصة شراكة.</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('programs.index') }}" class="btn-ghost btn-lg"><i class="fa-solid fa-layer-group"></i> تصفّح البرامج</a>
                    <a href="{{ route('contact.index') }}" class="btn-outline btn-lg">تواصل معنا</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
