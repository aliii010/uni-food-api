<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    /** @use HasFactory<\Database\Factories\FoodItemFactory> */
    use HasFactory;

    public function category() {
        return $this->belongsTo(FoodCategory::class, 'food_category_id');
    }
}
