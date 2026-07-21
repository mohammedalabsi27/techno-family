@extends('layouts.app')

@section('title', 'البرامج النوعية - تكنو فاملي')

@section('content')

@include('site.partials.page-header', [
    'badge'       => 'برامجنا النوعية',
    'title'       => '9 برامج تقنية على 3 سنوات',
    'breadcrumb'  => ['البرامج' => null],
    'image'       => 'images/headers/programs.jpg',
])

<section class="py-20">
    <div class="container-x">

        {{-- تبويبات السنوات --}}
        @if($programs->isNotEmpty())
        <div class="flex flex-wrap justify-center gap-3 mb-12" data-aos="fade-up">
            <button class="year-tab active" data-year="all">
                <i class="fa-solid fa-layer-group me-1"></i> جميع البرامج
            </button>
            @foreach(['السنة الأولى','السنة الثانية','السنة الثالثة'] as $yr)
            <button class="year-tab" data-year="{{ $yr }}">
                <i class="fa-solid fa-calendar-days me-1"></i> {{ $yr }}
            </button>
            @endforeach
        </div>
        @endif

        @if($programs->isEmpty())
            <div class="text-center py-20">
                <i class="fa-solid fa-folder-open text-6xl text-gray-200 mb-4 block"></i>
                <p class="text-gray-400">لا توجد برامج متاحة حالياً.</p>
            </div>
        @else
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($programs as $program)
                <div class="program-card-wrap" data-year="{{ $program->year_label }}"
                     data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 80 }}">
                    <a href="{{ route('programs.show', $program) }}"
                       class="group card card-hover overflow-hidden flex flex-col h-full">

                        <div class="relative aspect-video bg-gradient-to-br from-primary/10 to-secondary/10 overflow-hidden flex items-center justify-center">
                            @if($program->image)
                                <img src="{{ Storage::url($program->image) }}"
                                     alt="{{ $program->title }}"
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
        @endif

    </div>
</section>

@endsection
