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
        Schema::create('tsig_applications', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('gender', 30)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('nationality', 120)->nullable();
            $table->string('email')->index();
            $table->string('phone')->nullable();
            $table->string('current_occupation')->nullable();
            $table->string('organization')->nullable();
            $table->string('stakeholder_group');
            $table->string('stakeholder_other')->nullable();
            $table->string('highest_education')->nullable();
            $table->string('field_of_study')->nullable();
            $table->string('region')->nullable();
            $table->string('district')->nullable();
            
            $table->json('previous_participation')->nullable();
            $table->text('internet_governance_experience')->nullable();
            $table->text('motivation')->nullable();
            $table->text('institutional_benefit')->nullable();
            $table->text('passionate_issue')->nullable();
            $table->string('reach_commitment', 50)->nullable();
            
            $table->boolean('available_full_training')->nullable();
            $table->boolean('willing_participate_discussions')->nullable();
            $table->boolean('commit_tanzania_igf_2026')->nullable();
            $table->boolean('require_accessibility_support')->nullable();
            $table->boolean('data_protection_accepted')->default(false);
            $table->boolean('declaration_confirmed')->default(false);
            
            $table->string('status')->default('submitted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tsig_applications');
    }
};
