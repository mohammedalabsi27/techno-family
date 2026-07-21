<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        // البرامج النوعية التسعة من الكتيب التعريفي موزعة على 3 سنوات (ص17-19)
        // slug إنجليزي صريح لتجنّب تضارب/فراغ Str::slug مع العربية
        $programs = [
            // السنة الأولى
            [
                'slug' => 'family-quality-isfq',
                'year_label' => 'السنة الأولى',
                'title' => 'الجودة الأسرية ISFQ',
                'short_description' => 'المعايير العالمية للجودة الأسرية (International Standards for Family Quality)، إطار متكامل لقياس وتطوير جودة الحياة الأسرية.',
            ],
            [
                'slug' => 'family-education-365',
                'year_label' => 'السنة الأولى',
                'title' => '365 يوماً من التربية الأسرية',
                'short_description' => 'محتوى تربوي أسري يومي على مدار العام، يرافق الأسرة بجرعات معرفية ومهارية متجددة.',
            ],
            [
                'slug' => 'marriage-journey',
                'year_label' => 'السنة الأولى',
                'title' => 'رحلة عمر للمقبلين على الزواج',
                'short_description' => 'برنامج تأهيلي للمقبلين على الزواج يبني أدوات الحياة الزوجية السعيدة قبل بدء الرحلة.',
            ],

            // السنة الثانية
            [
                'slug' => 'family-exchange',
                'year_label' => 'السنة الثانية',
                'title' => 'بورصة الأسرة',
                'short_description' => 'منصة تفاعلية تقيس مؤشرات الحياة الأسرية وتحفّز على تطويرها بأسلوب مبتكر.',
            ],
            [
                'slug' => 'family-encyclopedia',
                'year_label' => 'السنة الثانية',
                'title' => 'موسوعة الأسرة',
                'short_description' => 'مرجع تقني شامل ومنظم يجمع المحتوى الأسري والتربوي للعاملين في القطاع الأسري.',
            ],
            [
                'slug' => 'happiness-city-game',
                'year_label' => 'السنة الثانية',
                'title' => 'لعبة مدينة السعادة',
                'short_description' => 'لعبة أسرية تفاعلية تنمّي القيم والمهارات الحياتية بأسلوب ترفيهي هادف.',
            ],

            // السنة الثالثة
            [
                'slug' => 'childhood-academy',
                'year_label' => 'السنة الثالثة',
                'title' => 'أكاديمية الطفولة',
                'short_description' => 'أكاديمية تقنية متخصصة في إعداد الأطفال وبنائهم معرفياً ومهارياً وسلوكياً.',
            ],
            [
                'slug' => 'first-time-mothers',
                'year_label' => 'السنة الثالثة',
                'title' => 'أمهات المرة الأولى',
                'short_description' => 'برنامج مساند للأمهات الجدد يرافقهن في رحلة الأمومة الأولى بالمعرفة والدعم.',
            ],
            [
                'slug' => 'good-values-game',
                'year_label' => 'السنة الثالثة',
                'title' => 'لعبة القيم الحسنى',
                'short_description' => 'لعبة تربوية تغرس القيم الحسنة في الأطفال والناشئة بطريقة محببة وممتعة.',
            ],
        ];

        // حذف برامج الموقع القديم (وقف التميز) قبل إدخال برامج Techno Family
        Program::whereNotIn('slug', array_column($programs, 'slug'))->delete();

        foreach ($programs as $index => $program) {
            Program::updateOrCreate(
                ['slug' => $program['slug']],
                [
                    'title' => $program['title'],
                    'year_label' => $program['year_label'],
                    'short_description' => $program['short_description'],
                    'description' => $program['short_description'], // TODO: وصف تفصيلي أطول لصفحة البرنامج
                    'order' => $index + 1,
                    'is_active' => true,
                ]
            );
        }
    }
}
