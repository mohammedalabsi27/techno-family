@extends('layouts.admin')

@section('title', 'الرئيسية')

@section('content')

<div class="mb-8">
    <h2 class="text-xl font-extrabold text-primary-dark">أهلاً بك 👋</h2>
    <p class="text-gray-500">هذه نظرة سريعة على محتوى الموقع</p>
</div>

{{-- ============ بطاقات الإحصائيات ============ --}}
<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">

    <a href="{{ route('admin.programs.index') }}" class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg hover:-translate-y-1 transition-all">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center">
                <i class="fa-solid fa-hands-holding-child text-primary text-xl"></i>
            </div>
            <span class="text-3xl font-extrabold text-primary-dark">{{ $stats['programs'] }}</span>
        </div>
        <h3 class="font-bold text-gray-700">البرامج</h3>
    </a>

    <a href="{{ route('admin.core-values.index') }}" class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg hover:-translate-y-1 transition-all">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-xl bg-secondary/10 flex items-center justify-center">
                <i class="fa-solid fa-star text-secondary text-xl"></i>
            </div>
            <span class="text-3xl font-extrabold text-primary-dark">{{ $stats['core_values'] }}</span>
        </div>
        <h3 class="font-bold text-gray-700">القيم</h3>
    </a>

    <a href="{{ route('admin.training-bags.index') }}" class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg hover:-translate-y-1 transition-all">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-xl bg-accent/10 flex items-center justify-center">
                <i class="fa-solid fa-briefcase text-accent-dark text-xl"></i>
            </div>
            <span class="text-3xl font-extrabold text-primary-dark">{{ $stats['training_bags'] }}</span>
        </div>
        <h3 class="font-bold text-gray-700">الحقائب التدريبية</h3>
    </a>

    <a href="{{ route('admin.training-bag-categories.index') }}" class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg hover:-translate-y-1 transition-all">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center">
                <i class="fa-solid fa-layer-group text-primary text-xl"></i>
            </div>
            <span class="text-3xl font-extrabold text-primary-dark">{{ $stats['training_bag_categories'] }}</span>
        </div>
        <h3 class="font-bold text-gray-700">تصنيفات الحقائب</h3>
    </a>

    <a href="{{ route('admin.impact-items.index') }}" class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg hover:-translate-y-1 transition-all">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-xl bg-secondary/10 flex items-center justify-center">
                <i class="fa-solid fa-chart-line text-secondary text-xl"></i>
            </div>
            <span class="text-3xl font-extrabold text-primary-dark">{{ $stats['impact_items'] }}</span>
        </div>
        <h3 class="font-bold text-gray-700">عناصر الأثر المتوقع</h3>
    </a>

    <a href="{{ route('admin.contact-messages.index') }}" class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg hover:-translate-y-1 transition-all relative">
        @if($stats['unread_messages'] > 0)
            <span class="absolute top-4 left-4 w-3 h-3 rounded-full bg-red-500"></span>
        @endif
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 rounded-xl bg-accent/10 flex items-center justify-center">
                <i class="fa-solid fa-envelope text-accent-dark text-xl"></i>
            </div>
            <span class="text-3xl font-extrabold text-primary-dark">{{ $stats['unread_messages'] }}</span>
        </div>
        <h3 class="font-bold text-gray-700">رسائل غير مقروءة</h3>
    </a>
</div>

{{-- ============ أحدث رسائل التواصل ============ --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-100">
    <div class="flex items-center justify-between px-6 py-5 border-b">
        <h3 class="font-bold text-primary-dark">أحدث رسائل التواصل</h3>
        <a href="{{ route('admin.contact-messages.index') }}" class="text-secondary text-sm font-semibold hover:text-primary">عرض الكل</a>
    </div>
    <div class="divide-y">
        @forelse($recentMessages as $message)
            <a href="{{ route('admin.contact-messages.show', $message) }}" class="flex items-center justify-between px-6 py-4 hover:bg-gray-50 transition">
                <div>
                    <p class="font-semibold text-gray-700">{{ $message->name }}</p>
                    <p class="text-gray-400 text-sm">{{ $message->email }}</p>
                </div>
                <div class="flex items-center gap-3">
                    @if(!$message->is_read)
                        <span class="bg-secondary/10 text-secondary px-3 py-1 rounded-full text-xs font-semibold">جديدة</span>
                    @endif
                    <span class="text-gray-400 text-sm">{{ $message->created_at->diffForHumans() }}</span>
                </div>
            </a>
        @empty
            <p class="px-6 py-10 text-center text-gray-400">لا توجد رسائل بعد</p>
        @endforelse
    </div>
</div>

@endsection
