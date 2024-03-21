<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodRecipes extends Model
{
    use HasFactory;

    public function foodData()
    {
        return $this->belongsToMany(FoodData::class);
    }


}
