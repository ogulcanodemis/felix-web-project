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

        Schema::create('web_links', function (Blueprint $table) {
            $table->id();
            $table->json('url');
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('target');
            $table->string('description')->nullable();
            $table->string('visible');
            $table->integer('rating')->nullable();
            $table->string('rel')->nullable();
            $table->text('notes')->nullable();
            $table->string('rss')->nullable();
            $table->string('web_linkable_type');
            $table->unsignedBigInteger('web_linkable_id');
            $table->string('type');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_links');
    }
};
