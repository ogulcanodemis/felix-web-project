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
        Schema::create('contact_request_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contact_request_id')->constrained('contact_requests');
            $table->text('message');
            $table->foreignId('recipient_id')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_request_messages');
    }
};
