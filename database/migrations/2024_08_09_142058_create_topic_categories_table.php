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
        Schema::create('topic_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('topic_id')->constrained('topics', 'id')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories', 'id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topic_categories');
    }
};
