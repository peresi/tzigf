<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('public_input_submissions', function (Blueprint $table): void {
            $table->string('submission_type', 40)->nullable()->after('id');
            $table->string('stakeholder_group', 120)->nullable()->after('organization');
            $table->string('whatsapp_number', 40)->nullable()->after('email');
            $table->string('region', 120)->nullable()->after('whatsapp_number');
            $table->json('thematic_areas')->nullable()->after('region');
            $table->text('priority_issues')->nullable()->after('thematic_areas');
            $table->text('additional_input')->nullable()->after('priority_issues');
            $table->text('implementation_impact')->nullable()->after('additional_input');
            $table->json('programme_design')->nullable()->after('implementation_impact');
            $table->text('programme_design_additional')->nullable()->after('programme_design');
            $table->json('intersessional_activities')->nullable()->after('programme_design_additional');
        });
    }

    public function down(): void
    {
        Schema::table('public_input_submissions', function (Blueprint $table): void {
            $table->dropColumn([
                'submission_type',
                'stakeholder_group',
                'whatsapp_number',
                'region',
                'thematic_areas',
                'priority_issues',
                'additional_input',
                'implementation_impact',
                'programme_design',
                'programme_design_additional',
                'intersessional_activities',
            ]);
        });
    }
};
