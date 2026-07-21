<?php

namespace Database\Seeders;

use App\Models\TrainingBag;
use App\Models\TrainingBagCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TrainingBagSeeder extends Seeder
{
    public function run(): void
    {
        // ⚠️ الموقع الأصلي كان يعرض "زوجية - 58" مكررة 5 مرات كبيانات تجريبية غير مكتملة.
        // هذي تصنيفات حقيقية مقترحة تطابق أسماء البرامج، عبّيها ببيانات الوقف الفعلية من لوحة التحكم.
        $categories = ['زوجية', 'أسرية', 'أطفال', 'شباب', 'فتيات'];

        foreach ($categories as $index => $name) {
            $category = TrainingBagCategory::updateOrCreate(
                ['slug' => Str::slug($name)],
                [
                    'name' => $name,
                    'order' => $index + 1,
                    'is_active' => true,
                ]
            );

            // مثال حقيبة واحدة تجريبية بكل تصنيف - للتوضيح فقط
            TrainingBag::updateOrCreate(
                ['slug' => Str::slug($name.'-حقيبة-تعريفية')],
                [
                    'training_bag_category_id' => $category->id,
                    'title' => "حقيبة {$name} التعريفية",
                    'description' => 'حقيبة تدريبية تجريبية — استبدلها ببيانات فعلية.',
                    'order' => 1,
                    'is_active' => true,
                ]
            );
        }
    }
}
