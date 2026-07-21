@csrf

<div class="grid md:grid-cols-2 gap-6">
    <div>
        <label class="block font-semibold text-gray-700 mb-2">اسم التصنيف</label>
        <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}" required
               class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">
        @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block font-semibold text-gray-700 mb-2">الترتيب</label>
        <input type="number" name="order" value="{{ old('order', $category->order ?? 0) }}"
               class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">
    </div>
</div>

<div class="flex items-center gap-3 mt-6">
    <input type="checkbox" name="is_active" value="1" id="is_active"
           {{ old('is_active', $category->is_active ?? true) ? 'checked' : '' }}
           class="w-5 h-5 rounded text-secondary focus:ring-secondary">
    <label for="is_active" class="font-semibold text-gray-700">مفعّل ويظهر بالموقع</label>
</div>

<div class="mt-8">
    <button type="submit" class="bg-primary hover:bg-primary-dark transition text-white font-bold px-8 py-3 rounded-xl">حفظ</button>
    <a href="{{ route('admin.training-bag-categories.index') }}" class="text-gray-500 font-semibold px-4">إلغاء</a>
</div>
