@extends('layouts.admin')

@section('title', 'رسائل التواصل')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-x-auto">
    <table class="w-full text-sm text-right">
        <thead class="bg-gray-50 text-gray-500 font-semibold">
            <tr>
                <th class="px-6 py-4">الاسم</th>
                <th class="px-6 py-4">البريد الإلكتروني</th>
                <th class="px-6 py-4">الجوال</th>
                <th class="px-6 py-4">التاريخ</th>
                <th class="px-6 py-4">الحالة</th>
                <th class="px-6 py-4">إجراءات</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse($messages as $message)
                <tr class="{{ $message->is_read ? '' : 'bg-secondary/5' }}">
                    <td class="px-6 py-4 font-semibold">{{ $message->name }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $message->email }}</td>
                    <td class="px-6 py-4 text-gray-500" dir="ltr">{{ $message->phone ?? '—' }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $message->created_at->format('Y-m-d H:i') }}</td>
                    <td class="px-6 py-4">
                        @if($message->is_read)
                            <span class="bg-gray-100 text-gray-500 px-3 py-1 rounded-full text-xs font-semibold">مقروءة</span>
                        @else
                            <span class="bg-secondary/10 text-secondary px-3 py-1 rounded-full text-xs font-semibold">جديدة</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex gap-3">
                            <a href="{{ route('admin.contact-messages.show', $message) }}" class="text-secondary hover:text-primary"><i class="fa-solid fa-eye"></i></a>
                            <form action="{{ route('admin.contact-messages.destroy', $message) }}" method="POST" onsubmit="return confirm('تأكيد الحذف؟')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="px-6 py-10 text-center text-gray-400">لا توجد رسائل بعد</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">{{ $messages->links() }}</div>
@endsection
