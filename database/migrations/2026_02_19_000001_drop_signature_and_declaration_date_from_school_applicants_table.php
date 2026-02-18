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
            $table->dropColumn(['signature', 'declaration_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('school_applicants', function (Blueprint $table): void {
            $table->string('signature')->nullable()->after('declaration_confirmed');
            $table->date('declaration_date')->nullable()->after('signature');
        });
    }
};
