<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        // ⚠️ حدّث البريد ورقم الجوال ببيانات صحيحة قبل الإطلاق —
        // البيانات بالموقع القديم كانت فيها أخطاء (mailto خاطئ، بريد بدومين مختلف)
        SiteSetting::updateOrCreate(
            ['id' => 1],
            [
                'waqf_license_number' => '5283',
                'waqf_deed_number' => '446131660',
                'about_short' => 'مؤسسة وقفية تعتني ببناء وتصميم البرامج الأسرية والتربوية والتعليمية وتقديم البرامج النوعية العملية للأسرة والخبراء والمجتمع',
                'address' => 'العيينة، حي الواحة',
                'phone' => '0000000000', // TODO: رقم صحيح
                'phone_secondary' => null,
                'email' => 'info@waqfaltamayaz.family', // TODO: تأكيد البريد الصحيح
                'facebook_url' => 'https://www.facebook.com/',
                'twitter_url' => 'https://twitter.com/',
                'instagram_url' => 'https://www.instagram.com/',
                'youtube_url' => null,
                'intro_video_url' => 'https://www.youtube.com/watch?v=XwVGF2mhLIg',
                'vision' => 'الحياة الأسرية من المسؤولية إلى الخيرية',
                'mission' => 'استقرار الأسرة وتماسك المجتمع لتحقيق جودة الحياة الأسرية من خلال تقديم البرامج النوعية (أسرياً وتربوياً وتعليمياً)',
            ]
        );
    }
}
