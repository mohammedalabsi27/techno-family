@extends('layouts.app')

@section('title', $program->title.' - تكنو فاملي')

@section('content')

@include('site.partials.page-header', [
    'title'      => $program->title,
    'breadcrumb' => ['البرامج' => route('programs.index'), $program->title => null],
    'image'      => 'images/headers/programs.jpg',
])

<section class="py-20">
    <div class="container-x grid lg:grid-cols-3 gap-12">

        {{-- المحتوى الرئيسي --}}
        <div class="lg:col-span-2" data-aos="fade-up">

            {{-- صورة البرنامج --}}
            <div class="rounded-3xl overflow-hidden shadow-soft aspect-video bg-gradient-to-br from-primary/10 to-secondary/10 flex items-center justify-center mb-8">
                @if($program->image)
                    <img src="{{ Storage::url($program->image) }}" alt="{{ $program->title }}" class="w-full h-full object-cover">
                @else
                    <i class="fa-solid fa-microchip text-7xl text-primary/15"></i>
                @endif
            </div>

            {{-- شارة السنة --}}
            @if($program->year_label)
            <span class="pill bg-primary/10 text-primary mb-4">
                <i class="fa-solid fa-calendar-days"></i> {{ $program->year_label }}
            </span>
            @endif

            {{-- الوصف القصير --}}
            @if($program->short_description)
            <p class="text-xl text-primary-dark font-semibold leading-8 mb-6 border-r-4 border-accent pr-5">
                {{ $program->short_description }}
            </p>
            @endif

            {{-- الوصف التفصيلي --}}
            @if($program->description && $program->description !== $program->short_description)
            <div class="prose prose-lg max-w-none text-gray-600 leading-8">
                {!! nl2br(e($program->description)) !!}
            </div>
            @endif

            {{-- معلومات إضافية --}}
            <div class="mt-10 grid sm:grid-cols-3 gap-4">
                <div class="card p-5 text-center">
                    <i class="fa-solid fa-users text-2xl text-primary mb-2 block"></i>
                    <span class="text-sm text-gray-500">الفئة المستهدفة</span>
                    <p class="font-bold text-gray-800 mt-1 text-sm">الأسرة والمجتمع</p>
                </div>
                <div class="card p-5 text-center">
                    <i class="fa-solid fa-mobile-screen-button text-2xl text-secondary mb-2 block"></i>
                    <span class="text-sm text-gray-500">نوع المنتج</span>
                    <p class="font-bold text-gray-800 mt-1 text-sm">منصة تقنية تفاعلية</p>
                </div>
                <div class="card p-5 text-center">
                    <i class="fa-solid fa-globe text-2xl text-accent-dark mb-2 block"></i>
                    <span class="text-sm text-gray-500">نطاق الوصول</span>
                    <p class="font-bold text-gray-800 mt-1 text-sm">عربي وعالمي</p>
                </div>
            </div>
        </div>

        {{-- الشريط الجانبي --}}
        <aside data-aos="fade-up" data-aos-delay="120">
            <div class="card p-6 sticky top-28 space-y-5">

                {{-- CTA --}}
                <div class="rounded-2xl bg-gradient-to-br from-primary to-primary-dark p-6 text-white text-center">
                    <i class="fa-solid fa-handshake-angle text-3xl mb-3 block text-accent"></i>
                    <h3 class="font-bold text-lg mb-2">يهمّك هذا البرنامج؟</h3>
                    <p class="text-white/75 text-sm leading-6 mb-4">
                        تواصل معنا لمعرفة تفاصيل المشاركة أو الدعم.
                    </p>
                    <a href="{{ route('contact.index') }}" class="btn-ghost btn-md w-full">
                        <i class="fa-solid fa-paper-plane"></i> تواصل معنا
                    </a>
                </div>

                {{-- رابط الكل --}}
                <a href="{{ route('programs.index') }}"
                   class="flex items-center gap-2 text-primary font-bold text-sm hover:text-secondary hover:gap-3 transition-all">
                    <i class="fa-solid fa-arrow-right"></i> جميع البرامج
                </a>

                {{-- إحصائية سريعة --}}
                <div class="border-t pt-5 space-y-3">
                    <div class="flex items-center gap-3 text-sm text-gray-600">
                        <i class="fa-solid fa-layer-group text-primary w-4"></i>
                        <span>ضمن خطة 9 برامج نوعية</span>
                    </div>
                    <div class="flex items-center gap-3 text-sm text-gray-600">
                        <i class="fa-solid fa-flag text-accent w-4"></i>
                        <span>تكاملاً مع رؤية 2030</span>
                    </div>
                    <div class="flex items-center gap-3 text-sm text-gray-600">
                        <i class="fa-solid fa-certificate text-secondary w-4"></i>
                        <span>مؤسسة وقفية مرخّصة</span>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</section>

@endsection
