@extends('layouts.admin')

@section('title', 'الحسابات البنكية')

@section('content')
<div class="flex justify-end mb-6">
    <a href="{{ route('admin.bank-accounts.create') }}" class="bg-primary hover:bg-primary-dark transition text-white font-bold px-6 py-2.5 rounded-xl">
        <i class="fa-solid fa-plus ms-1"></i> إضافة حساب
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-x-auto">
    <table class="w-full text-sm text-right">
        <thead class="bg-gray-50 text-gray-500 font-semibold">
            <tr>
                <th class="px-6 py-4">الترتيب</th>
                <th class="px-6 py-4">البنك</th>
                <th class="px-6 py-4">رقم الحساب</th>
                <th class="px-6 py-4">الآيبان</th>
                <th class="px-6 py-4">الحالة</th>
                <th class="px-6 py-4">إجراءات</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @forelse($accounts as $account)
                <tr>
                    <td class="px-6 py-4 text-gray-500">{{ $account->order }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            @if($account->logo)
                                <img src="{{ Storage::url($account->logo) }}" alt="" class="w-10 h-10 rounded-xl object-contain bg-gray-50 p-1 border border-gray-100">
                            @else
                                <span class="w-10 h-10 inline-flex items-center justify-center rounded-xl bg-primary/10 text-primary text-lg"><i class="fa-solid fa-building-columns"></i></span>
                            @endif
                            <div>
                                <span class="font-semibold block">{{ $account->bank_name }}</span>
                                @if($account->account_name)
                                    <span class="text-gray-400 text-xs">{{ $account->account_name }}</span>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-gray-500" dir="ltr">{{ $account->account_number ?: '—' }}</td>
                    <td class="px-6 py-4 text-gray-500" dir="ltr">{{ $account->iban ?: '—' }}</td>
                    <td class="px-6 py-4">
                        @if($account->is_active)
                            <span class="bg-green-50 text-green-600 px-3 py-1 rounded-full text-xs font-semibold">مفعّل</span>
                        @else
                            <span class="bg-gray-100 text-gray-500 px-3 py-1 rounded-full text-xs font-semibold">معطّل</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex gap-3">
                            <a href="{{ route('admin.bank-accounts.edit', $account) }}" class="text-secondary hover:text-primary"><i class="fa-solid fa-pen"></i></a>
                            <form action="{{ route('admin.bank-accounts.destroy', $account) }}" method="POST" onsubmit="return confirm('تأكيد الحذف؟')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="px-6 py-10 text-center text-gray-400">لا توجد حسابات بعد</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
