<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        // ⚠️ حدّث البريد ورقم الجوال ببيانات صحيحة قبل الإطلاق.
        SiteSetting::updateOrCreate(
            ['id' => 1],
            [
                // يُعاد استخدام الحقل لعرض ترخيص وزارة التجارة
                'waqf_license_number' => '1010905271',
                'waqf_deed_number' => null,
                'about_short' => 'مؤسسة وقفية متخصصة في التنمية المستدامة التقنية، تسخّر التقنية بجميع مجالاتها (مواقع ومنصات وتطبيقات وألعاب) لخدمة جميع أفراد الأسرة معرفياً ومهارياً وسلوكياً.',
                'address' => 'المملكة العربية السعودية',
                'phone' => '0000000000', // TODO: رقم صحيح
                'phone_secondary' => null,
                'email' => 'info@technofamily.sa', // TODO: تأكيد البريد الصحيح
                'facebook_url' => 'https://www.facebook.com/',
                'twitter_url' => 'https://twitter.com/',
                'instagram_url' => 'https://www.instagram.com/',
                'youtube_url' => null,
                'intro_video_url' => null,
                'vision' => 'تسهيل التربية بواسطة التقنية لإحداث أثر إيجابي مستمر، في كل بيت وفي كل فرد.',
                'mission' => 'مؤسسة وقفية تقنية تعمل على تقديم التربية الأسرية من خلال التقنية للوصول لأكبر عدد من الأسر في العالم وتحقيق جودة الحياة الأسرية.',
            ]
        );
    }
}
