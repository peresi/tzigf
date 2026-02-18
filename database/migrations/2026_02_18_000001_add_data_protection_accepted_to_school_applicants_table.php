<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('school_applicants', function (Blueprint $table): void {
            $table->boolean('data_protection_accepted')->default(false)->after('require_accommodation_support');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('school_applicants', function (Blueprint $table): void {
            $table->dropColumn('data_protection_accepted');
        });
    }
};
