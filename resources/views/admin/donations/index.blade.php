@extends('layouts.admin')

@section('title', 'التبرعات')

@section('content')

{{-- إحصائيات سريعة --}}
<div class="grid sm:grid-cols-3 gap-5 mb-6">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 flex items-center gap-4">
        <span class="w-12 h-12 rounded-xl bg-primary/10 text-primary grid place-items-center text-xl"><i class="fa-solid fa-hand-holding-heart"></i></span>
        <div>
            <p class="text-gray-400 text-xs font-semibold">إجمالي التبرعات</p>
            <p class="text-2xl font-extrabold text-primary-dark">{{ $stats['total'] }}</p>
        </div>
    </div>
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 flex items-center gap-4">
        <span class="w-12 h-12 rounded-xl bg-accent/15 text-accent-dark grid place-items-center text-xl"><i class="fa-solid fa-bell"></i></span>
        <div>
            <p class="text-gray-400 text-xs font-semibold">تبرعات جديدة</p>
            <p class="text-2xl font-extrabold text-primary-dark">{{ $stats['new'] }}</p>
        </div>
    </div>
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 flex items-center gap-4">
        <span class="w-12 h-12 rounded-xl bg-green-50 text-green-600 grid place-items-center text-xl"><i class="fa-solid fa-sack-dollar"></i></span>
        <div>
            <p class="text-gray-400 text-xs font-semibold">المبالغ المؤكدة (ريال)</p>
            <p class="text-2xl font-extrabold text-primary-dark">{{ number_format($stats['confirmed_amount'], 0) }}</p>
        </div>
    </div>
</div>

{{-- فلترة بالحالة --}}
<div class="flex flex-wrap gap-2 mb-6">
    @php
        $filters = ['' => 'الكل', 'new' => 'جديد', 'confirmed' => 'مؤكد', 'rejected' => 'مرفوض'];
    @endphp
    @foreach($filters as $value => $label)
        <a href="{{ route('admin.donations.index', $value ? ['status' => $value] : []) }}"
           class="px-5 py-2 rounded-xl text-sm font-semibold transition {{ ($status ?? '') === $value || (!$status && $value === '') ? 'bg-primary text-white' : 'bg-white border border-gray-200 text-gray-600 hover:border-primary hover:text-primary' }}">
            {{ $label }}
        </a>
    @endforeach
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-x-auto">
    <table class="w-full text-sm text-right">
        <thead class="bg-gray-50 text-gray-500 font-semibold">
            <tr>
                <th class="px-6 py-4">المتبرع</th>
                <th class="px-6 py-4">المبلغ</th>
                <th class="px-6 py-4">البنك</th>
                <th class="px-6 py-4">الحالة</th>
                <th class="px-6 py-4">التاريخ</th>
                <th class="px-6 py-4">إجراءات</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse($donations as $donation)
                <tr class="{{ $donation->status === 'new' ? 'bg-accent/5' : '' }}">
                    <td class="px-6 py-4">
                        <span class="font-semibold block">{{ $donation->name }}</span>
                        <span class="text-gray-400 text-xs" dir="ltr">{{ $donation->phone }}</span>
                    </td>
                    <td class="px-6 py-4 font-extrabold text-primary-dark">{{ number_format($donation->amount, 0) }} <span class="text-xs text-gray-400 font-normal">ريال</span></td>
                    <td class="px-6 py-4 text-gray-500">{{ $donation->bankAccount?->bank_name ?? '—' }}</td>
                    <td class="px-6 py-4">
                        @if($donation->status === 'confirmed')
                            <span class="bg-green-50 text-green-600 px-3 py-1 rounded-full text-xs font-semibold">مؤكد</span>
                        @elseif($donation->status === 'rejected')
                            <span class="bg-red-50 text-red-500 px-3 py-1 rounded-full text-xs font-semibold">مرفوض</span>
                        @else
                            <span class="bg-accent/15 text-accent-dark px-3 py-1 rounded-full text-xs font-semibold">جديد</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-gray-400 text-xs">{{ $donation->created_at->format('Y/m/d H:i') }}</td>
                    <td class="px-6 py-4">
                        <div class="flex gap-3">
                            <a href="{{ route('admin.donations.show', $donation) }}" class="text-secondary hover:text-primary"><i class="fa-solid fa-eye"></i></a>
                            <form action="{{ route('admin.donations.destroy', $donation) }}" method="POST" onsubmit="return confirm('تأكيد الحذف؟')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="px-6 py-10 text-center text-gray-400">لا توجد تبرعات بعد</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $donations->links() }}
</div>
@endsection
