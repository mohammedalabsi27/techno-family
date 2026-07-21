<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('roadmap_items', function (Blueprint $table) {
            $table->string('icon')->nullable()->after('year_label'); // كلاس Font Awesome مثال: fa-solid fa-building
            $table->string('year_label')->nullable()->change();      // السنة/المرحلة صارت اختيارية
        });
    }

    public function down(): void
    {
        Schema::table('roadmap_items', function (Blueprint $table) {
            $table->dropColumn('icon');
            $table->string('year_label')->nullable(false)->change();
        });
    }
};
