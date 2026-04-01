<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('session_proposals', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('organization')->nullable();
            $table->string('country', 120);
            $table->string('email')->index();
            $table->string('session_title');
            $table->json('thematic_areas');
            $table->string('session_format', 120);
            $table->text('session_description');
            $table->string('moderator_name');
            $table->string('moderator_organization')->nullable();
            $table->string('moderator_email');
            $table->string('speaker_one');
            $table->string('speaker_two');
            $table->string('speaker_three')->nullable();
            $table->json('stakeholder_groups');
            $table->text('expected_outcomes');
            $table->string('supporting_document_path')->nullable();
            $table->string('supporting_document_name')->nullable();
            $table->boolean('consent')->default(false);
            $table->string('status')->default('submitted');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('session_proposals');
    }
};
