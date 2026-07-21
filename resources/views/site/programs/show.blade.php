@extends('layouts.app')

@section('title', $program->title.' - وقف التميز الأسري')

@section('content')

@include('site.partials.page-header', [
    'title' => $program->title,
    'breadcrumb' => ['البرامج' => route('programs.index'), $program->title => null],
    'image' => 'images/headers/programs.jpg',
])

<section class="py-20">
    <div class="container-x grid lg:grid-cols-3 gap-12">
        <div class="lg:col-span-2" data-aos="fade-up">
            <div class="rounded-3xl overflow-hidden shadow-soft aspect-video bg-gradient-to-br from-primary/10 to-secondary/10 flex items-center justify-center mb-8">
                @if($program->image)
                    <img src="{{ Storage::url($program->image) }}" alt="{{ $program->title }}" class="w-full h-full object-cover">
                @else
                    <i class="fa-solid fa-hands-holding-child text-6xl text-primary/30"></i>
                @endif
            </div>

            @if($program->short_description)
                <p class="text-lg text-primary-dark font-semibold leading-8 mb-6">{{ $program->short_description }}</p>
            @endif

            <div class="prose prose-lg max-w-none text-gray-600 leading-8">
                {!! nl2br(e($program->description)) !!}
            </div>
        </div>

        <aside class="space-y-6" data-aos="fade-up" data-aos-delay="120">
            <div class="card p-6 sticky top-28">
                <h3 class="font-bold text-primary-dark mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-circle-info text-secondary"></i> هل يهمّك هذا البرنامج؟
                </h3>
                <p class="text-gray-500 text-sm leading-6 mb-5">تواصل معنا لمعرفة تفاصيل أكثر عن هذا البرنامج وفرص المشاركة أو الدعم.</p>
                <a href="{{ route('contact.index') }}" class="btn-primary btn-md w-full">
                    <i class="fa-solid fa-paper-plane"></i> تواصل معنا
                </a>
                <a href="{{ route('programs.index') }}" class="mt-3 inline-flex items-center gap-2 text-primary font-bold text-sm hover:text-secondary hover:gap-3 transition-all">
                    <i class="fa-solid fa-arrow-right"></i> جميع البرامج
                </a>
            </div>
        </aside>
    </div>
</section>

@endsection
