@extends('layouts.admin')

@section('title', 'تصنيفات الحقائب التدريبية')

@section('content')
<div class="flex justify-end mb-6">
    <a href="{{ route('admin.training-bag-categories.create') }}" class="bg-primary hover:bg-primary-dark transition text-white font-bold px-6 py-2.5 rounded-xl">
        <i class="fa-solid fa-plus ms-1"></i> إضافة تصنيف
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-x-auto">
    <table class="w-full text-sm text-right">
        <thead class="bg-gray-50 text-gray-500 font-semibold">
            <tr>
                <th class="px-6 py-4">الاسم</th>
                <th class="px-6 py-4">عدد الحقائب</th>
                <th class="px-6 py-4">الترتيب</th>
                <th class="px-6 py-4">الحالة</th>
                <th class="px-6 py-4">إجراءات</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse($categories as $category)
                <tr>
                    <td class="px-6 py-4 font-semibold">{{ $category->name }}</td>
                    <td class="px-6 py-4 text-secondary font-bold">{{ $category->bags_count }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $category->order }}</td>
                    <td class="px-6 py-4">
                        @if($category->is_active)
                            <span class="bg-green-50 text-green-600 px-3 py-1 rounded-full text-xs font-semibold">مفعّل</span>
                        @else
                            <span class="bg-gray-100 text-gray-500 px-3 py-1 rounded-full text-xs font-semibold">معطّل</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex gap-3">
                            <a href="{{ route('admin.training-bag-categories.edit', $category) }}" class="text-secondary hover:text-primary"><i class="fa-solid fa-pen"></i></a>
                            <form action="{{ route('admin.training-bag-categories.destroy', $category) }}" method="POST" onsubmit="return confirm('تأكيد الحذف؟ سيتم حذف كل الحقائب المرتبطة بهذا التصنيف!')">
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
