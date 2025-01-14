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
        Schema::disableForeignKeyConstraints();

        Schema::create('taxonomies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('taxonomies');
            $table->foreignId('term_id');
            $table->json('name');
            $table->json('description')->nullable();
            $table->bigInteger('taxonomy_group')->nullable();
            $table->bigInteger('order')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taxonomies');
    }
};
