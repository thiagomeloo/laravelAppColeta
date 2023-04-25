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
        Schema::create('users_notifications_preferences_materials_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('notification_preference_id')->constrained(table:'users_notifications_preferences',indexName:'u_np_mt_idu_foreign')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('type_material_id')->constrained(table:'types_materials',indexName:'u_np_mt_idmt_foreign')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestampsTz();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_notifications_preferences_materials_types');
    }
};
