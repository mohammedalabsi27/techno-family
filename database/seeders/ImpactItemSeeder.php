<?php

namespace Database\Seeders;

use App\Models\ImpactItem;
use Illuminate\Database\Seeder;

class ImpactItemSeeder extends Seeder
{
    public function run(): void
    {
        // العوائد والأثر المتوقع من الكتيب التعريفي (ص18)
        // label = الكلمة الكبيرة البارزة | title = التوضيح تحتها
        $items = [
            ['label' => 'إثراء',    'title' => 'المجال الأسري بالابتكار التقني'],
            ['label' => '300 ألف', 'title' => 'أسرة تطبق جودة الحياة الأسرية'],
            ['label' => 'تفعيل',   'title' => 'الجهات الأسرية بالبرامج النوعية'],
            ['label' => 'تسريع',   'title' => 'الوصول لرؤية المملكة 2030'],
        ];

        ImpactItem::query()->delete();

        foreach ($items as $index => $item) {
            ImpactItem::create([
                'label'     => $item['label'],
                'title'     => $item['title'],
                'order'     => $index + 1,
                'is_active' => true,
            ]);
        }
    }
}
