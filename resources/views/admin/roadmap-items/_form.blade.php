@csrf

<div class="grid md:grid-cols-2 gap-6">
    <div>
        <label class="block font-semibold text-gray-700 mb-2">العنوان</label>
        <input type="text" name="title" value="{{ old('title', $item->title ?? '') }}" required
               class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">
        @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block font-semibold text-gray-700 mb-2">الأيقونة <span class="text-gray-400 font-normal">(كلاس Font Awesome — اختياري)</span></label>
        <input type="text" name="icon" value="{{ old('icon', $item->icon ?? '') }}" placeholder="fa-solid fa-building" dir="ltr"
               class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">
        @error('icon') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
</div>

<div class="mt-6">
    <label class="block font-semibold text-gray-700 mb-2">السنة / المرحلة <span class="text-gray-400 font-normal">(اختياري)</span></label>
    <input type="text" name="year_label" value="{{ old('year_label', $item->year_label ?? '') }}" placeholder="السنة الأولى"
           class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">
    @error('year_label') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
</div>

<div class="mt-6">
    <label class="block font-semibold text-gray-700 mb-2">الوصف (اختياري)</label>
    <textarea name="description" rows="3"
              class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">{{ old('description', $item->description ?? '') }}</textarea>
</div>

<div class="grid md:grid-cols-2 gap-6 mt-6">
    <div>
        <label class="block font-semibold text-gray-700 mb-2">الترتيب</label>
        <input type="number" name="order" value="{{ old('order', $item->order ?? 0) }}"
               class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">
    </div>
    <div class="flex items-center gap-3 pt-8">
        <input type="checkbox" name="is_active" value="1" id="is_active"
               {{ old('is_active', $item->is_active ?? true) ? 'checked' : '' }}
               class="w-5 h-5 rounded text-secondary focus:ring-secondary">
        <label for="is_active" class="font-semibold text-gray-700">مفعّل ويظهر بالموقع</label>
    </div>
</div>

<div class="mt-8">
    <button type="submit" class="bg-primary hover:bg-primary-dark transition text-white font-bold px-8 py-3 rounded-xl">حفظ</button>
    <a href="{{ route('admin.roadmap-items.index') }}" class="text-gray-500 font-semibold px-4">إلغاء</a>
</div>
