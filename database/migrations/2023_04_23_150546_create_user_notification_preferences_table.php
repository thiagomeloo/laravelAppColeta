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
        Schema::create('users_notifications_preferences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id')->constrained(table:'locations', indexName:'u_np_idlocation_foreign')->cascadeOnDelete()->cascadeOnUpdate();
            $table->float('raio_location')->nullable();
            $table->boolean('accept_notification')->default(false);
            $table->timestampsTz();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_notifications_preferences');
    }
};
