@csrf

<div class="grid md:grid-cols-2 gap-6">
    <div>
        <label class="block font-semibold text-gray-700 mb-2">اسم البنك</label>
        <input type="text" name="bank_name" value="{{ old('bank_name', $account->bank_name ?? '') }}" required
               class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">
        @error('bank_name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block font-semibold text-gray-700 mb-2">اسم صاحب الحساب <span class="text-gray-400 font-normal">(اختياري)</span></label>
        <input type="text" name="account_name" value="{{ old('account_name', $account->account_name ?? '') }}" placeholder="وقف التميز الأسري"
               class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">
        @error('account_name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
</div>

<div class="grid md:grid-cols-2 gap-6 mt-6">
    <div>
        <label class="block font-semibold text-gray-700 mb-2">رقم الحساب <span class="text-gray-400 font-normal">(اختياري)</span></label>
        <input type="text" name="account_number" value="{{ old('account_number', $account->account_number ?? '') }}" dir="ltr"
               class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">
        @error('account_number') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block font-semibold text-gray-700 mb-2">الآيبان IBAN <span class="text-gray-400 font-normal">(اختياري)</span></label>
        <input type="text" name="iban" value="{{ old('iban', $account->iban ?? '') }}" dir="ltr" placeholder="SA0000000000000000000000"
               class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">
        @error('iban') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
</div>

<div class="mt-6">
    <label class="block font-semibold text-gray-700 mb-2">شعار البنك <span class="text-gray-400 font-normal">(اختياري)</span></label>
    @if(!empty($account->logo))
        <img src="{{ Storage::url($account->logo) }}" alt="" class="h-14 rounded-xl mb-3 border border-gray-100 p-1">
    @endif
    <input type="file" name="logo" accept="image/*"
           class="w-full rounded-xl border border-gray-300 px-4 py-3 file:me-4 file:rounded-lg file:border-0 file:bg-primary/10 file:text-primary file:font-semibold file:px-4 file:py-1.5">
    @error('logo') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
</div>

<div class="grid md:grid-cols-2 gap-6 mt-6">
    <div>
        <label class="block font-semibold text-gray-700 mb-2">الترتيب</label>
        <input type="number" name="order" value="{{ old('order', $account->order ?? 0) }}"
               class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">
    </div>
    <div class="flex items-center gap-3 pt-8">
        <input type="checkbox" name="is_active" value="1" id="is_active"
               {{ old('is_active', $account->is_active ?? true) ? 'checked' : '' }}
               class="w-5 h-5 rounded text-secondary focus:ring-secondary">
        <label for="is_active" class="font-semibold text-gray-700">مفعّل ويظهر بالموقع</label>
    </div>
</div>

<div class="mt-8">
    <button type="submit" class="bg-primary hover:bg-primary-dark transition text-white font-bold px-8 py-3 rounded-xl">حفظ</button>
    <a href="{{ route('admin.bank-accounts.index') }}" class="text-gray-500 font-semibold px-4">إلغاء</a>
</div>
