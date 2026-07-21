@extends('layouts.admin')

@section('title', 'تفاصيل التبرع')

@section('content')
<div class="max-w-3xl space-y-6">

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <div class="flex items-center justify-between flex-wrap gap-4 mb-6 pb-6 border-b">
            <div>
                <h2 class="text-2xl font-extrabold text-primary-dark">{{ number_format($donation->amount, 2) }} <span class="text-base text-gray-400 font-normal">ريال</span></h2>
                <p class="text-gray-400 text-sm mt-1">{{ $donation->created_at->format('Y/m/d H:i') }}</p>
            </div>
            @if($donation->status === 'confirmed')
                <span class="bg-green-50 text-green-600 px-4 py-1.5 rounded-full text-sm font-semibold">مؤكد</span>
            @elseif($donation->status === 'rejected')
                <span class="bg-red-50 text-red-500 px-4 py-1.5 rounded-full text-sm font-semibold">مرفوض</span>
            @else
                <span class="bg-accent/15 text-accent-dark px-4 py-1.5 rounded-full text-sm font-semibold">جديد</span>
            @endif
        </div>

        <dl class="grid sm:grid-cols-2 gap-x-8 gap-y-5 text-sm">
            <div>
                <dt class="text-gray-400 font-semibold mb-1">اسم المتبرع</dt>
                <dd class="font-bold text-gray-800">{{ $donation->name }}</dd>
            </div>
            <div>
                <dt class="text-gray-400 font-semibold mb-1">رقم الجوال</dt>
                <dd class="font-bold text-gray-800" dir="ltr">{{ $donation->phone }}</dd>
            </div>
            <div>
                <dt class="text-gray-400 font-semibold mb-1">البريد الإلكتروني</dt>
                <dd class="font-bold text-gray-800">{{ $donation->email ?: '—' }}</dd>
            </div>
            <div>
                <dt class="text-gray-400 font-semibold mb-1">الحساب المحوَّل إليه</dt>
                <dd class="font-bold text-gray-800">{{ $donation->bankAccount?->bank_name ?? '—' }}</dd>
            </div>
            <div>
                <dt class="text-gray-400 font-semibold mb-1">مرجع التحويل</dt>
                <dd class="font-bold text-gray-800" dir="ltr">{{ $donation->transfer_reference ?: '—' }}</dd>
            </div>
        </dl>

        @if($donation->note)
            <div class="mt-6 bg-gray-50 rounded-xl p-5 text-sm text-gray-600 leading-7">
                <p class="text-gray-400 font-semibold mb-1">ملاحظة المتبرع:</p>
                {{ $donation->note }}
            </div>
        @endif
    </div>

    {{-- تغيير الحالة --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <h3 class="font-extrabold text-gray-800 mb-4">تحديث الحالة</h3>
        <div class="flex flex-wrap gap-3">
            @foreach(['confirmed' => ['مؤكد', 'bg-green-600 hover:bg-green-700'], 'new' => ['جديد', 'bg-accent hover:bg-accent-dark'], 'rejected' => ['مرفوض', 'bg-red-500 hover:bg-red-600']] as $value => [$label, $classes])
                @if($donation->status !== $value)
                    <form action="{{ route('admin.donations.update-status', $donation) }}" method="POST">
                        @csrf @method('PATCH')
                        <input type="hidden" name="status" value="{{ $value }}">
                        <button type="submit" class="{{ $classes }} transition text-white font-bold px-6 py-2.5 rounded-xl text-sm">
                            تحويل إلى: {{ $label }}
                        </button>
                    </form>
                @endif
            @endforeach
        </div>
    </div>

    <a href="{{ route('admin.donations.index') }}" class="inline-flex items-center gap-2 text-gray-500 font-semibold hover:text-primary transition">
        <i class="fa-solid fa-arrow-right"></i> العودة للتبرعات
    </a>
</div>
@endsection
