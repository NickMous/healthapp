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
        Schema::create('food_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('food_data_source_id')->constrained()->cascadeOnDelete();
            $table->string('name_original')->nullable();
            $table->string('name');
            $table->string('food_group')->nullable();
            $table->integer('serving_g')->default(100);
            $table->string('notes')->nullable();
            $table->integer('energy_kcal')->nullable();
            $table->integer('protein_g')->nullable();
            $table->integer('fat_g')->nullable();
            $table->integer('water_g')->nullable();
            $table->integer('fiber_g')->nullable();
            $table->integer('sugar_g')->nullable();
            $table->integer('carbohydrates_g')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_data');
    }
};
