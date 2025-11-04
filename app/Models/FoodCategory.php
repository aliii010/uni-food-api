<?php

namespace App\Models;

use App\Http\filters\QueryFilter;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    /** @use HasFactory<\Database\Factories\FoodCategoryFactory> */
    use HasFactory;

    public function foodItems() {
        return $this->hasMany(FoodItem::class);
    }

    #[Scope]
    protected function filter(Builder $builder, QueryFilter $filters) {
        return $filters->apply($builder);
    }
}
