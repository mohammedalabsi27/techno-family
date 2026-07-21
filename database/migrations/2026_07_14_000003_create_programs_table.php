<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // مثال: برامج الخبراء
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->text('short_description')->nullable(); // يظهر بالبطاقة بالرئيسية
            $table->longText('description')->nullable(); // يظهر بصفحة التفاصيل
            $table->unsignedInteger('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
