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

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->references('id')->on('comments');
            $table->text('content')->nullable();
            $table->string('type');
            $table->foreignId('author_id')->references('id')->on('users');
            $table->string('commentable_type');
            $table->unsignedBigInteger('commentable_id');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
