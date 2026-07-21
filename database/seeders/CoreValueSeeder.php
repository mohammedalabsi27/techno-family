<?php

namespace Database\Seeders;

use App\Models\CoreValue;
use Illuminate\Database\Seeder;

class CoreValueSeeder extends Seeder
{
    public function run(): void
    {
        $values = [
            ['title' => 'المسؤولية', 'icon' => 'fa-solid fa-hand-holding-heart'],
            ['title' => 'الانتماء', 'icon' => 'fa-solid fa-people-roof'],
            ['title' => 'الخيرية', 'icon' => 'fa-solid fa-hands-praying'],
            ['title' => 'الابتكار', 'icon' => 'fa-solid fa-lightbulb'],
            ['title' => 'الاستدامة', 'icon' => 'fa-solid fa-seedling'],
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
