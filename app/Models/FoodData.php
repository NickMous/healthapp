<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodData extends Model
{
    use HasFactory;

    protected $fillable = [
        'food_data_source_id',
        'name_original',
        'name',
        'food_group',
        'serving_g',
        'notes',
        'energy_kcal',
        'protein_g',
        'fat_g',
        'water_g',
        'fiber_g',
        'sugar_g',
        'carbohydrates_g',
    ];

    public function foodDataSource()
    {
        return $this->belongsTo(FoodDataSources::class);
    }

    public function getEnergyKjAttribute()
    {
        return $this->energy_kcal * 4.184;
    }
}
