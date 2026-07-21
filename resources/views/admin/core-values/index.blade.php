@extends('layouts.admin')

@section('title', 'القيم')

@section('content')
<div class="flex justify-end mb-6">
    <a href="{{ route('admin.core-values.create') }}" class="bg-primary hover:bg-primary-dark transition text-white font-bold px-6 py-2.5 rounded-xl">
        <i class="fa-solid fa-plus ms-1"></i> إضافة قيمة
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-x-auto">
    <table class="w-full text-sm text-right">
        <thead class="bg-gray-50 text-gray-500 font-semibold">
            <tr>
                <th class="px-6 py-4">الترتيب</th>
                <th class="px-6 py-4">الأيقونة</th>
                <th class="px-6 py-4">العنوان</th>
                <th class="px-6 py-4">الحالة</th>
                <th class="px-6 py-4">إجراءات</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse($values as $value)
                <tr>
                    <td class="px-6 py-4 text-gray-500">{{ $value->order }}</td>
                    <td class="px-6 py-4"><i class="{{ $value->icon }} text-primary text-lg"></i></td>
                    <td class="px-6 py-4 font-semibold">{{ $value->title }}</td>
                    <td class="px-6 py-4">
                        @if($value->is_active)
                            <span class="bg-green-50 text-green-600 px-3 py-1 rounded-full text-xs font-semibold">مفعّل</span>
                        @else
                            <span class="bg-gray-100 text-gray-500 px-3 py-1 rounded-full text-xs font-semibold">معطّل</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex gap-3">
                            <a href="{{ route('admin.core-values.edit', $value) }}" class="text-secondary hover:text-primary"><i class="fa-solid fa-pen"></i></a>
                            <form action="{{ route('admin.core-values.destroy', $value) }}" method="POST" onsubmit="return confirm('تأكيد الحذف؟')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="px-6 py-10 text-center text-gray-400">لا توجد بيانات بعد</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
