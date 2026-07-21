@csrf

<div class="grid md:grid-cols-2 gap-6">
    <div>
        <label class="block font-semibold text-gray-700 mb-2">عنوان البرنامج</label>
        <input type="text" name="title" value="{{ old('title', $program->title ?? '') }}" required
               class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">
        @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block font-semibold text-gray-700 mb-2">الرابط (Slug) - اختياري، يتولّد تلقائياً</label>
        <input type="text" name="slug" value="{{ old('slug', $program->slug ?? '') }}" dir="ltr"
               class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">
        @error('slug') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
</div>

<div class="mt-6">
    <label class="block font-semibold text-gray-700 mb-2">صورة البرنامج</label>
    @if(!empty($program->image))
        <img src="{{ Storage::url($program->image) }}" class="w-32 h-32 object-cover rounded-xl mb-3">
    @endif
    <input type="file" name="image" accept="image/*"
           class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">
    @error('image') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
</div>

<div class="mt-6">
    <label class="block font-semibold text-gray-700 mb-2">وصف مختصر (يظهر بالبطاقة)</label>
    <textarea name="short_description" rows="2"
              class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">{{ old('short_description', $program->short_description ?? '') }}</textarea>
</div>

<div class="mt-6">
    <label class="block font-semibold text-gray-700 mb-2">الوصف التفصيلي (يظهر بصفحة البرنامج)</label>
    <textarea name="description" rows="6"
              class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">{{ old('description', $program->description ?? '') }}</textarea>
</div>

<div class="grid md:grid-cols-2 gap-6 mt-6">
    <div>
        <label class="block font-semibold text-gray-700 mb-2">الترتيب</label>
        <input type="number" name="order" value="{{ old('order', $program->order ?? 0) }}"
               class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">
    </div>
    <div class="flex items-center gap-3 pt-8">
        <input type="checkbox" name="is_active" value="1" id="is_active"
               {{ old('is_active', $program->is_active ?? true) ? 'checked' : '' }}
               class="w-5 h-5 rounded text-secondary focus:ring-secondary">
        <label for="is_active" class="font-semibold text-gray-700">مفعّل ويظهر بالموقع</label>
    </div>
</div>

<div class="mt-8">
    <button type="submit" class="bg-primary hover:bg-primary-dark transition text-white font-bold px-8 py-3 rounded-xl">
        حفظ
    </button>
    <a href="{{ route('admin.programs.index') }}" class="text-gray-500 font-semibold px-4">إلغاء</a>
</div>
