@extends('layouts.app')

@section('title', 'البرامج - وقف التميز الأسري')

@section('content')

@include('site.partials.page-header', [
    'badge' => 'برامجنا',
    'title' => 'البرامج ومشاريع الوقف',
    'breadcrumb' => ['البرامج' => null],
    'image' => 'images/headers/programs.jpg',
])

<section class="py-20">
    <div class="container-x">
        @if($programs->isEmpty())
            <div class="text-center py-16">
                <i class="fa-solid fa-folder-open text-6xl text-gray-200 mb-4"></i>
                <p class="text-gray-500">لا توجد برامج متاحة حالياً.</p>
            </div>
        @else
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($programs as $program)
                    <a href="{{ route('programs.show', $program) }}"
                       class="group card card-hover overflow-hidden"
                       data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 80 }}">
                        <div class="aspect-video bg-gradient-to-br from-primary/10 to-secondary/10 flex items-center justify-center overflow-hidden">
                            @if($program->image)
                                <img src="{{ Storage::url($program->image) }}" alt="{{ $program->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <i class="fa-solid fa-hands-holding-child text-5xl text-primary/30"></i>
                            @endif
                        </div>
                        <div class="p-6">
                            <h3 class="font-bold text-lg text-primary-dark group-hover:text-secondary transition mb-2">{{ $program->title }}</h3>
                            <p class="text-gray-500 text-sm leading-6 line-clamp-2">{{ $program->short_description }}</p>
                            <span class="inline-flex items-center gap-2 text-accent-dark font-bold text-sm mt-4 group-hover:gap-3 transition-all">
                                التفاصيل <i class="fa-solid fa-arrow-left"></i>
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</section>

@endsection
