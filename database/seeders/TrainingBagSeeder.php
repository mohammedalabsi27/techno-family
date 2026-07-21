<?php

namespace Database\Seeders;

use App\Models\TrainingBag;
use App\Models\TrainingBagCategory;
use Illuminate\Database\Seeder;

class TrainingBagSeeder extends Seeder
{
    public function run(): void
    {
        // تصنيفات تطابق مجالات عمل Techno Family — slug إنجليزي صريح لأن Str::slug لا يدعم العربية
        // عبّئها بالحقائب الفعلية من لوحة التحكم
        $categories = [
            ['slug' => 'family-quality', 'name' => 'الجودة الأسرية'],
            ['slug' => 'parenting',      'name' => 'التربية'],
            ['slug' => 'marriage',       'name' => 'الزوجية'],
            ['slug' => 'childhood',      'name' => 'الطفولة'],
            ['slug' => 'experts',        'name' => 'الخبراء'],
        ];

        // حذف تصنيفات وحقائب الموقع القديم
        TrainingBag::query()->delete();
        TrainingBagCategory::query()->delete();

        foreach ($categories as $index => $data) {
            $category = TrainingBagCategory::create([
                'slug' => $data['slug'],
                'name' => $data['name'],
                'order' => $index + 1,
                'is_active' => true,
            ]);

            // مثال حقيبة واحدة تجريبية بكل تصنيف - للتوضيح فقط
            TrainingBag::create([
                'training_bag_category_id' => $category->id,
                'slug' => $data['slug'].'-intro',
                'title' => "حقيبة {$data['name']} التعريفية",
                'description' => 'حقيبة تدريبية تجريبية — استبدلها ببيانات فعلية.',
                'order' => 1,
                'is_active' => true,
            ]);
        }
    }
}
