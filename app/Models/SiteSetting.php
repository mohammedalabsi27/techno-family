<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'logo',
        'mobile_logo',
        'waqf_license_number',
        'waqf_deed_number',
        'about_short',
        'address',
        'phone',
        'phone_secondary',
        'email',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'youtube_url',
        'intro_video_url',
        'vision',
        'mission',
    ];

    /**
     * إعدادات الموقع سطر واحد فقط (Singleton Pattern).
     * الاستخدام: SiteSetting::current()
     */
    public static function current(): self
    {
        return static::first() ?? static::create([]);
    }
}
