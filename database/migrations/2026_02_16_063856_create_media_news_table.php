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
        Schema::create('media_news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('type', ['news', 'media'])->default('news');
            $table->date('published_at')->nullable();
            $table->text('body')->nullable();
            $table->string('external_url')->nullable();
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_news');
    }
};
