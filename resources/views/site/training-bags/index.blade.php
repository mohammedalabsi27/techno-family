@extends('layouts.app')

@section('title', 'الحقائب التدريبية - وقف التميز الأسري')

@section('content')

@include('site.partials.page-header', [
    'badge' => 'مكتبة المعرفة',
    'title' => 'الحقائب التدريبية',
    'breadcrumb' => ['الحقائب التدريبية' => null],
    'image' => 'images/headers/training-bags.jpg',
])

<section class="py-16">
    <div class="container-x">

        {{-- فلترة التصنيفات --}}
        <div class="flex flex-wrap gap-3 justify-center mb-12" data-aos="fade-up">
            <a href="{{ route('training-bags.index') }}"
               class="px-5 py-2 rounded-full font-semibold text-sm transition {{ request('category') ? 'bg-gray-100 text-gray-600 hover:bg-gray-200' : 'bg-primary text-white shadow-soft' }}">
                الكل
            </a>
            @foreach($categories as $category)
                <a href="{{ route('training-bags.index', ['category' => $category->slug]) }}"
                   class="px-5 py-2 rounded-full font-semibold text-sm transition {{ request('category') === $category->slug ? 'bg-primary text-white shadow-soft' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                    {{ $category->name }} <span class="opacity-70">({{ $category->bags_count }})</span>
                </a>
            @endforeach
        </div>

        @if($bags->isEmpty())
            <div class="text-center py-16">
                <i class="fa-solid fa-box-open text-6xl text-gray-200 mb-4"></i>
                <p class="text-gray-500">لا توجد حقائب تدريبية متاحة حالياً.</p>
            </div>
        @else
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($bags as $bag)
                    <a href="{{ route('training-bags.show', $bag) }}"
                       class="group card card-hover p-6 flex flex-col"
                       data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 70 }}">
                        <div class="flex items-center justify-between mb-4">
                            <span class="pill bg-secondary/10 text-secondary text-xs">
                                <i class="fa-solid fa-tag"></i> {{ $bag->category->name }}
                            </span>
                            <span class="w-10 h-10 rounded-xl bg-primary/5 text-primary grid place-items-center group-hover:bg-primary group-hover:text-white transition-colors">
                                <i class="fa-solid fa-briefcase"></i>
                            </span>
                        </div>
                        <h3 class="font-bold text-lg text-primary-dark group-hover:text-secondary transition mb-2">{{ $bag->title }}</h3>
                        <p class="text-gray-500 text-sm leading-6 line-clamp-3 flex-1">{{ $bag->description }}</p>
                        <span class="inline-flex items-center gap-2 text-accent-dark font-bold text-sm mt-4 group-hover:gap-3 transition-all">
                            عرض الحقيبة <i class="fa-solid fa-arrow-left"></i>
                        </span>
                    </a>
                @endforeach
            </div>

            <div class="mt-12">
                {{ $bags->links() }}
            </div>
        @endif
    </div>
</section>

@endsection
