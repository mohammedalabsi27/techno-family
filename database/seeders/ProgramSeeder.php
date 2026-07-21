<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        $programs = [
            [
                'title' => 'برامج الخبراء',
                'short_description' => 'برامج تأهيلية متخصصة لبناء المهتمين بالأسرة والعاملين معها وتطويرهم في المجالات النفسية والتربوية والاجتماعية والسلوكية.',
            ],
            [
                'title' => 'برامج الأطفال',
                'short_description' => 'برامج قيمية تربوية تساهم في إعداد الناشئة وبنائهم بشكل متكامل من جميع النواحي التي يحتاجونها.',
            ],
            [
                'title' => 'برامج الفتيات',
                'short_description' => 'برامج متنوعة تلبي احتياجات الفتيات وتبني ذواتهم وقدراتهم فيما يحتاجونه فكرياً ووجدانياً ومهارياً.',
            ],
            [
                'title' => 'برامج الشباب',
                'short_description' => 'برامج متنوعة تلبي احتياجات الشباب وتبني ذواتهم وقدراتهم فيما يحتاجونه فكرياً ووجدانياً ومهارياً.',
            ],
            [
                'title' => 'برامج الوالدين',
                'short_description' => 'برامج تساعد الوالدين على تربية أولادهم والعناية بهم في شتى مجالات الحياة.',
            ],
            [
                'title' => 'برامج الزوجية',
                'short_description' => 'برامج تُعنى بتأهيل الزوجين وتمكينهم من أدوات الحياة السعيدة قبل الزواج وأثناءه وبعده.',
            ],
            [
                'title' => 'برامج الأسرة',
                'short_description' => 'برامج تربوية وقيمية ومهارية لكافة أفراد الأسرة، تساهم في تحقيق جودة الحياة الأسرية.',
            ],
        ];

        foreach ($programs as $index => $program) {
            Program::updateOrCreate(
                ['slug' => Str::slug($program['title'])],
                [
                    'title' => $program['title'],
                    'short_description' => $program['short_description'],
                    'description' => $program['short_description'], // TODO: وصف تفصيلي أطول لصفحة البرنامج
                    'order' => $index + 1,
                    'is_active' => true,
                ]
            );
        }
    }
}
