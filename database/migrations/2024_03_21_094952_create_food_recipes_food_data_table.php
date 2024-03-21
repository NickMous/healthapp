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
        Schema::create('food_recipes_food_data', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\FoodRecipes::class);
            $table->foreignIdFor(\App\Models\FoodData::class);
            $table->integer('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_recipes_food_data');
    }
};
