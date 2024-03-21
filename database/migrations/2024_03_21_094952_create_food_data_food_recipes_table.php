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
        Schema::create('food_data_food_recipes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\FoodRecipes::class)->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\FoodData::class)->cascadeOnDelete();
            $table->integer('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_data_food_recipes');
    }
};
