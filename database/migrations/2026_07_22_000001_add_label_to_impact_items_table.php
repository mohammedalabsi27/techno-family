<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('impact_items', function (Blueprint $table) {
            // الكلمة الكبيرة البارزة (إثراء / 300 ألف / تفعيل / تسريع)
            $table->string('label')->nullable()->after('id');
        });
    }

    public function down(): void
    {
        Schema::table('impact_items', function (Blueprint $table) {
            $table->dropColumn('label');
        });
    }
};
