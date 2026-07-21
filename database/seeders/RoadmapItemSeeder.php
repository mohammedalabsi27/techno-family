<?php

namespace Database\Seeders;

use App\Models\RoadmapItem;
use Illuminate\Database\Seeder;

class RoadmapItemSeeder extends Seeder
{
    public function run(): void
    {
        // مراحل تأسيس المؤسسة الوقفية للتطبيقات الأسرية من الكتيب (ص11)
        $items = [
            ['icon' => 'fa-solid fa-magnifying-glass-chart', 'title' => 'حصر التطبيقات الأسرية', 'description' => 'معرفة الأنواع الأكثر احتياجاً لدى الأسر العربية'],
            ['icon' => 'fa-solid fa-list-check',             'title' => 'حصر الاحتياجات التقنية', 'description' => 'ما المتوفر لدينا وما سنحتاجه مستقبلاً'],
            ['icon' => 'fa-solid fa-compass',                'title' => 'التوجه الاستراتيجي',    'description' => 'تصوّر النتائج النهائية من وقت مبكر'],
            ['icon' => 'fa-solid fa-route',                  'title' => 'توزيع المسارات',        'description' => 'أهداف واضحة لكل مسار لتحقيق التوازن'],
            ['icon' => 'fa-solid fa-clipboard-list',         'title' => 'الخطط والنماذج الإدارية', 'description' => 'متابعة المخرجات والتقويم والتطوير المستمر'],
            ['icon' => 'fa-solid fa-cubes',                  'title' => 'تصميم المنتجات التقنية', 'description' => 'مشاريع معينة على تحقيق الأهداف'],
            ['icon' => 'fa-solid fa-bullseye',               'title' => 'صياغة مؤشرات الأداء',   'description' => 'لكل البرامج والتطبيقات وأدلتها'],
            ['icon' => 'fa-solid fa-people-group',           'title' => 'تكوين فريق العمل',      'description' => 'توزيع المهام والأدوار والتدريب'],
        ];

        // حذف البيانات القديمة ثم إدخال المحتوى الصحيح
        RoadmapItem::query()->delete();

        foreach ($items as $index => $item) {
            RoadmapItem::create([
                'icon' => $item['icon'],
                'title' => $item['title'],
                'description' => $item['description'],
                'year_label' => null,
                'order' => $index + 1,
                'is_active' => true,
            ]);
        }
    }
}
