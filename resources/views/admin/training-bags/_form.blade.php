@csrf

<div class="grid md:grid-cols-2 gap-6">
    <div>
        <label class="block font-semibold text-gray-700 mb-2">عنوان الحقيبة</label>
        <input type="text" name="title" value="{{ old('title', $bag->title ?? '') }}" required
               class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">
        @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block font-semibold text-gray-700 mb-2">التصنيف</label>
        <select name="training_bag_category_id" required
                class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">
            <option value="">اختر تصنيف</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('training_bag_category_id', $bag->training_bag_category_id ?? '') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('training_bag_category_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
</div>

<div class="mt-6">
    <label class="block font-semibold text-gray-700 mb-2">الوصف</label>
    <textarea name="description" rows="4"
              class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">{{ old('description', $bag->description ?? '') }}</textarea>
</div>

<div class="mt-6">
    <label class="block font-semibold text-gray-700 mb-2">ملف الحقيبة (PDF أو أي ملف)</label>
    @if(!empty($bag->file_path))
        <a href="{{ Storage::url($bag->file_path) }}" target="_blank" class="text-secondary text-sm mb-2 block"><i class="fa-solid fa-paperclip"></i> الملف الحالي</a>
    @endif
    <input type="file" name="file_path"
           class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">
    @error('file_path') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
</div>

<div class="grid md:grid-cols-2 gap-6 mt-6">
    <div>
        <label class="block font-semibold text-gray-700 mb-2">الترتيب</label>
        <input type="number" name="order" value="{{ old('order', $bag->order ?? 0) }}"
               class="w-full rounded-xl border border-gray-300 focus:border-secondary focus:ring-2 focus:ring-secondary/30 px-4 py-3">
    </div>
    <div class="flex items-center gap-3 pt-8">
        <input type="checkbox" name="is_active" value="1" id="is_active"
               {{ old('is_active', $bag->is_active ?? true) ? 'checked' : '' }}
               class="w-5 h-5 rounded text-secondary focus:ring-secondary">
        <label for="is_active" class="font-semibold text-gray-700">مفعّل ويظهر بالموقع</label>
    </div>
</div>

<div class="mt-8">
    <button type="submit" class="bg-primary hover:bg-primary-dark transition text-white font-bold px-8 py-3 rounded-xl">حفظ</button>
    <a href="{{ route('admin.training-bags.index') }}" class="text-gray-500 font-semibold px-4">إلغاء</a>
</div>
