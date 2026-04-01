<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('public_input_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('organization')->nullable();
            $table->string('country', 120);
            $table->string('email')->index();
            $table->string('issue_title');
            $table->text('issue_description');
            $table->text('relevance_to_tanzania');
            $table->text('policy_questions');
            $table->json('stakeholders');
            $table->boolean('consent')->default(false);
            $table->string('status')->default('submitted');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('public_input_submissions');
    }
};
