@extends('layouts.admin')

@section('title', 'خارطة السير')

@section('content')
<div class="flex justify-end mb-6">
    <a href="{{ route('admin.roadmap-items.create') }}" class="bg-primary hover:bg-primary-dark transition text-white font-bold px-6 py-2.5 rounded-xl">
        <i class="fa-solid fa-plus ms-1"></i> إضافة مرحلة
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-x-auto">
    <table class="w-full text-sm text-right">
        <thead class="bg-gray-50 text-gray-500 font-semibold">
            <tr>
                <th class="px-6 py-4">الترتيب</th>
                <th class="px-6 py-4">الأيقونة</th>
                <th class="px-6 py-4">العنوان</th>
                <th class="px-6 py-4">التفاصيل</th>
                <th class="px-6 py-4">الحالة</th>
                <th class="px-6 py-4">إجراءات</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse($items as $item)
                <tr>
                    <td class="px-6 py-4 text-gray-500">{{ $item->order }}</td>
                    <td class="px-6 py-4">
                        <span class="w-10 h-10 inline-flex items-center justify-center rounded-xl bg-primary/10 text-primary text-lg">
                            <i class="{{ $item->icon ?: 'fa-solid fa-flag' }}"></i>
                        </span>
                    </td>
                    <td class="px-6 py-4 font-semibold">{{ $item->title }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $item->description }}</td>
                    <td class="px-6 py-4">
                        @if($item->is_active)
                            <span class="bg-green-50 text-green-600 px-3 py-1 rounded-full text-xs font-semibold">مفعّل</span>
                        @else
                            <span class="bg-gray-100 text-gray-500 px-3 py-1 rounded-full text-xs font-semibold">معطّل</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex gap-3">
                            <a href="{{ route('admin.roadmap-items.edit', $item) }}" class="text-secondary hover:text-primary"><i class="fa-solid fa-pen"></i></a>
                            <form action="{{ route('admin.roadmap-items.destroy', $item) }}" method="POST" onsubmit="return confirm('تأكيد الحذف؟')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="px-6 py-10 text-center text-gray-400">لا توجد بيانات بعد</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
