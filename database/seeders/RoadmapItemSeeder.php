<?php

namespace Database\Seeders;

use App\Models\RoadmapItem;
use Illuminate\Database\Seeder;

class RoadmapItemSeeder extends Seeder
{
    public function run(): void
    {
        // خارطة سير وقف التميز الأسري خلال السنوات الخمس (المحتوى الرسمي)
        $items = [
            ['icon' => 'fa-solid fa-calendar-days',     'title' => 'الخطة الاستراتيجية', 'description' => '5 سنوات'],
            ['icon' => 'fa-solid fa-building',          'title' => 'البنية التحتية',     'description' => 'تجهيز المقر والكوادر والهوية'],
            ['icon' => 'fa-solid fa-people-group',      'title' => 'الحوكمة الإدارية',   'description' => 'البناء الإداري والمالي والقانوني'],
            ['icon' => 'fa-solid fa-people-roof',       'title' => 'البرامج الأسرية',    'description' => 'لجميع فئات الأسرة والمجتمع'],
            ['icon' => 'fa-solid fa-lightbulb',         'title' => 'ابتكار المنتجات',    'description' => 'تصميم محتوى أسري متخصص'],
            ['icon' => 'fa-solid fa-laptop-code',       'title' => 'البرامج التقنية',    'description' => 'برمجة المواقع والمنصات الأسرية'],
            ['icon' => 'fa-solid fa-chart-line',        'title' => 'النمو والتميز',      'description' => 'الوصول للامتياز التجاري'],
        ];

        // حذف البيانات المبدئية القديمة ثم إدخال المحتوى الصحيح
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
