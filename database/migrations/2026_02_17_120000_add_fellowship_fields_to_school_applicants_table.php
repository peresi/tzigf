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
            $table->string('gender', 30)->nullable()->after('full_name');
            $table->date('date_of_birth')->nullable()->after('gender');
            $table->string('nationality', 120)->nullable()->after('date_of_birth');
            $table->string('district', 150)->nullable()->after('region');

            $table->string('current_occupation')->nullable()->after('organization');
            $table->string('highest_education')->nullable()->after('stakeholder_group');
            $table->string('field_of_study')->nullable()->after('highest_education');
            $table->string('stakeholder_other')->nullable()->after('field_of_study');

            $table->json('previous_participation')->nullable()->after('statement_of_interest');
            $table->text('internet_governance_experience')->nullable()->after('previous_participation');

            $table->text('motivation')->nullable()->after('internet_governance_experience');
            $table->text('institutional_benefit')->nullable()->after('motivation');
            $table->text('passionate_issue')->nullable()->after('institutional_benefit');

            $table->boolean('available_full_training')->nullable()->after('passionate_issue');
            $table->boolean('willing_participate_discussions')->nullable()->after('available_full_training');
            $table->boolean('commit_tanzania_igf_2026')->nullable()->after('willing_participate_discussions');

            $table->boolean('require_accessibility_support')->nullable()->after('commit_tanzania_igf_2026');
            $table->boolean('require_travel_support')->nullable()->after('require_accessibility_support');
            $table->boolean('require_accommodation_support')->nullable()->after('require_travel_support');

            $table->boolean('declaration_confirmed')->nullable()->after('require_accommodation_support');
            $table->string('signature')->nullable()->after('declaration_confirmed');
            $table->date('declaration_date')->nullable()->after('signature');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('school_applicants', function (Blueprint $table): void {
            $table->dropColumn([
                'gender',
                'date_of_birth',
                'nationality',
                'district',
                'current_occupation',
                'highest_education',
                'field_of_study',
                'stakeholder_other',
                'previous_participation',
                'internet_governance_experience',
                'motivation',
                'institutional_benefit',
                'passionate_issue',
                'available_full_training',
                'willing_participate_discussions',
                'commit_tanzania_igf_2026',
                'require_accessibility_support',
                'require_travel_support',
                'require_accommodation_support',
                'declaration_confirmed',
                'signature',
                'declaration_date',
            ]);
        });
    }
};
