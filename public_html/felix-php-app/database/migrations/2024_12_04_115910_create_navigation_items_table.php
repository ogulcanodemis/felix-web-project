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
        Schema::create('navigation_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('navigation_id');
            $table->string('type');
            $table->string('icon')->nullable();
            $table->json('link_title');
            $table->json('link_url')->nullable();
            $table->foreignId('link_target_on_site')->nullable()->references('id')->on('web_links');
            $table->string('target');
            $table->unsignedInteger('sort')->nullable();
            $table->foreignId('parent_id')->nullable()->references('id')->on('navigation_items');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('navigation_items');
    }
};
