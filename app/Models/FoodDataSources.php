<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodDataSources extends Model
{
    protected $fillable = [
        'name',
        'description',
        'url',
        'license',
        'reference',
        'file_type',
        'version',
        'row_delimiter',
        'column_delimiter',
    ];

    public function foodData()
    {
        return $this->hasMany(FoodData::class);
    }
}
