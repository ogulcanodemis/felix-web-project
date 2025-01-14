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

        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->foreignId('parent_id')->nullable()->references('id')->on('posts');
            $table->string('name')->nullable();
            $table->json('title');
            $table->json('description')->nullable();
            $table->json('content')->nullable();
            $table->string('status');
            $table->string('comment_status');
            $table->foreignId('author_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
