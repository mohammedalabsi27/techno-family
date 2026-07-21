@extends('layouts.admin')

@section('title', 'البرامج')

@section('content')
<div class="flex justify-end mb-6">
    <a href="{{ route('admin.programs.create') }}" class="bg-primary hover:bg-primary-dark transition text-white font-bold px-6 py-2.5 rounded-xl">
        <i class="fa-solid fa-plus ms-1"></i> إضافة برنامج
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-x-auto">
    <table class="w-full text-sm text-right">
        <thead class="bg-gray-50 text-gray-500 font-semibold">
            <tr>
                <th class="px-6 py-4">الصورة</th>
                <th class="px-6 py-4">العنوان</th>
                <th class="px-6 py-4">الترتيب</th>
                <th class="px-6 py-4">الحالة</th>
                <th class="px-6 py-4">السنة</th>
                <th class="px-6 py-4">إجراءات</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse($programs as $program)
                <tr>
                    <td class="px-6 py-4">
                        @if($program->image)
                            <img src="{{ Storage::url($program->image) }}" class="w-14 h-14 rounded-lg object-cover">
                        @else
                            <div class="w-14 h-14 rounded-lg bg-primary/10 flex items-center justify-center text-primary/40"><i class="fa-solid fa-image"></i></div>
                        @endif
                    </td>
                    <td class="px-6 py-4 font-semibold">{{ $program->title }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $program->order }}</td>
                    <td class="px-6 py-4">
                        @if($program->is_active)
                            <span class="bg-green-50 text-green-600 px-3 py-1 rounded-full text-xs font-semibold">مفعّل</span>
                        @else
                            <span class="bg-gray-100 text-gray-500 px-3 py-1 rounded-full text-xs font-semibold">معطّل</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-gray-500">{{ $program->year_label }}</td>
                    <td class="px-6 py-4">
                        <div class="flex gap-3">
                            <a href="{{ route('programs.show', $program) }}" target="_blank" class="text-gray-400 hover:text-primary"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('admin.programs.edit', $program) }}" class="text-secondary hover:text-primary"><i class="fa-solid fa-pen"></i></a>
                            <form action="{{ route('admin.programs.destroy', $program) }}" method="POST" onsubmit="return confirm('تأكيد الحذف؟')">
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
