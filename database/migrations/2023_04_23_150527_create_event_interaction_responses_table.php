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
        Schema::create('events_interactions_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_interaction_id')->constrained('events_interactions');
            $table->foreignId('user_id')->constrained('users');
            $table->text('text');
            $table->timestampsTz();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events_interactions_responses');
    }
};
