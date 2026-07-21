<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('mobile_logo')->nullable();
            $table->string('waqf_license_number')->nullable(); // ترخيص هيئة الأوقاف
            $table->string('waqf_deed_number')->nullable(); // رقم صك الوقفية
            $table->text('about_short')->nullable(); // نبذة مختصرة (تظهر بالفوتر)
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_secondary')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('intro_video_url')->nullable(); // فيديو تعريفي من نحن
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
