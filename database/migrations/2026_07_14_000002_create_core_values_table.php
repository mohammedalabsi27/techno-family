<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // ملاحظة: استخدمنا اسم core_values بدل values لأن "values" كلمة محجوزة في MySQL 8+
        Schema::create('core_values', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // مثال: المسؤولية، الانتماء
            $table->string('icon')->nullable(); // مسار الأيقونة أو اسم كلاس Font Awesome
            $table->text('description')->nullable();
            $table->unsignedInteger('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('core_values');
    }
};
