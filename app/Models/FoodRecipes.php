<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodRecipes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ingredients',
        'amount',
        'version',
        'source_id',
    ];

    public function foodData()
    {
        return $this->belongsToMany(FoodData::class);
    }

    public function foodDataSources()
    {
        return $this->belongsTo(FoodDataSources::class);
    }
}
