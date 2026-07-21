<?php

namespace Database\Seeders;

use App\Models\CoreValue;
use Illuminate\Database\Seeder;

class CoreValueSeeder extends Seeder
{
    public function run(): void
    {
        // قيم Techno Family من الكتيب التعريفي (ص10)
        $values = [
            ['title' => 'المسؤولية', 'icon' => 'fa-solid fa-shield-halved'],
            ['title' => 'الوعي', 'icon' => 'fa-solid fa-lightbulb'],
            ['title' => 'التحفيز', 'icon' => 'fa-solid fa-bolt'],
            ['title' => 'الترابط', 'icon' => 'fa-solid fa-link'],
            ['title' => 'التنمية', 'icon' => 'fa-solid fa-seedling'],
        ];

        foreach ($values as $index => $value) {
            CoreValue::updateOrCreate(
                ['title' => $value['title']],
                [
                    'icon' => $value['icon'],
                    'order' => $index + 1,
                    'is_active' => true,
                ]
            );
        }
    }
}
