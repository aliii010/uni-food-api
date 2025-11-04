<?php

namespace App\Http\filters;

class FoodCategoryFilter extends QueryFilter {
    
    public function include($value) {
        $this->builder->with($value);
    }

    public function name($value) {
        return $this->builder->where('name', 'like', str_replace('*', '%', $value));
    }
}