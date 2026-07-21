@extends('layouts.app')

@section('title', $bag->title.' - وقف التميز الأسري')

@section('content')

@include('site.partials.page-header', [
    'badge' => $bag->category->name,
    'title' => $bag->title,
    'breadcrumb' => ['الحقائب التدريبية' => route('training-bags.index'), $bag->title => null],
    'image' => 'images/headers/training-bags.jpg',
])

<section class="py-20">
    <div class="container-x max-w-3xl" data-aos="fade-up">
        <div class="card p-8 md:p-12">
            <div class="flex items-center gap-4 mb-8 pb-8 border-b border-gray-100">
                <div class="w-16 h-16 shrink-0 rounded-2xl bg-gradient-to-br from-primary to-secondary text-white grid place-items-center text-2xl shadow-soft">
                    <i class="fa-solid fa-briefcase"></i>
                </div>
                <div>
                    <span class="pill bg-secondary/10 text-secondary text-xs mb-1">{{ $bag->category->name }}</span>
                    <h2 class="text-xl font-extrabold text-primary-dark">{{ $bag->title }}</h2>
                </div>
            </div>

            <p class="text-gray-600 leading-8 mb-8 whitespace-pre-line">{{ $bag->description }}</p>

            <div class="flex flex-wrap gap-4">
                @if($bag->file_path)
                    <a href="{{ Storage::url($bag->file_path) }}" target="_blank" rel="noopener" class="btn-primary btn-lg">
                        <i class="fa-solid fa-download"></i> تحميل الحقيبة
                    </a>
                @endif
                <a href="{{ route('training-bags.index') }}" class="btn inline-flex items-center gap-2 text-primary font-bold border-2 border-primary/20 hover:bg-primary/5 btn-lg">
                    <i class="fa-solid fa-arrow-right"></i> جميع الحقائب
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
