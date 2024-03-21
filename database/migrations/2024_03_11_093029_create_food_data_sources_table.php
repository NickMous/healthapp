<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('food_data_sources', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('url')->nullable();
            $table->string('license')->nullable();
            $table->string('reference')->nullable();
            $table->string('file_type')->nullable();
            $table->string('ingredients_version')->nullable();
            $table->string('recipes_version')->nullable();
            $table->string('row_delimiter')->nullable()->default("\n");
            $table->string('column_delimiter')->nullable()->default(",");
            $table->json('ingredients_columns')->nullable();
            $table->json('recipes_columns')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_data_sources');
    }
};
