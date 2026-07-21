<?php

namespace Database\Seeders;

use App\Models\ImpactItem;
use Illuminate\Database\Seeder;

class ImpactItemSeeder extends Seeder
{
    public function run(): void
    {
        // العوائد والأثر المتوقع من الكتيب التعريفي (ص16-18)
        $items = [
            'إثراء المجال الأسري بالابتكار التقني',
            'الوصول لـ 300 ألف أسرة تطبّق جودة الحياة الأسرية',
            'تفعيل الجهات الأسرية بالبرامج النوعية',
            'تسريع الوصول لرؤية المملكة 2030',
            'الوصول لـ 10 ملايين مستفيد لكل برنامج وتطبيق',
            '9 برامج تقنية نوعية خلال 3 سنوات',
        ];

        // حذف عناصر الموقع القديم ثم إدخال المحتوى الصحيح
        ImpactItem::query()->delete();

        foreach ($items as $index => $title) {
            ImpactItem::create([
                'title' => $title,
                'order' => $index + 1,
                'is_active' => true,
            ]);
        }
    }
}
