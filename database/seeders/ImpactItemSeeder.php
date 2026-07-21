<?php

namespace Database\Seeders;

use App\Models\ImpactItem;
use Illuminate\Database\Seeder;

class ImpactItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            'تحقيق الأمن والاطمئنان والاستقرار الأسري',
            'الوصول لجودة الحياة الأسرية في المجتمع',
            'زيادة الوعي والثقافة الأسرية لكافة أفراد المجتمع',
            'أطفال مبدعون وشباب وفتيات رياديون في الوطن',
            'تجهيز فريق متكامل من الخبراء والمتخصصين',
            'الفوز بالخيرية للأسر (خيركم خيركم لأهله)',
        ];

        foreach ($items as $index => $title) {
            ImpactItem::updateOrCreate(
                ['title' => $title],
                [
                    'order' => $index + 1,
                    'is_active' => true,
                ]
            );
        }
    }
}
