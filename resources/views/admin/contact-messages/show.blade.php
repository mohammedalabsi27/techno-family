@extends('layouts.admin')

@section('title', 'تفاصيل الرسالة')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 max-w-2xl">
    <div class="grid md:grid-cols-2 gap-6 mb-6 pb-6 border-b">
        <div>
            <span class="text-gray-400 text-sm">الاسم</span>
            <p class="font-bold text-lg">{{ $message->name }}</p>
        </div>
        <div>
            <span class="text-gray-400 text-sm">التاريخ</span>
            <p class="font-bold text-lg">{{ $message->created_at->format('Y-m-d H:i') }}</p>
        </div>
        <div>
            <span class="text-gray-400 text-sm">البريد الإلكتروني</span>
            <p class="font-bold text-lg" dir="ltr">{{ $message->email }}</p>
        </div>
        <div>
            <span class="text-gray-400 text-sm">الجوال</span>
            <p class="font-bold text-lg" dir="ltr">{{ $message->phone ?? '—' }}</p>
        </div>
    </div>

    <span class="text-gray-400 text-sm">الرسالة</span>
    <p class="leading-8 text-gray-700 mt-2">{{ $message->message }}</p>

    <div class="mt-8 flex gap-3">
        <a href="mailto:{{ $message->email }}" class="bg-primary hover:bg-primary-dark transition text-white font-bold px-6 py-2.5 rounded-xl">
            <i class="fa-solid fa-reply ms-1"></i> الرد بالبريد
        </a>
        <a href="{{ route('admin.contact-messages.index') }}" class="text-gray-500 font-semibold px-4 py-2.5">رجوع</a>
    </div>
</div>
@endsection
