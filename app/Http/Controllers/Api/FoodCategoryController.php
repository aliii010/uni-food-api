<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\filters\FoodCategoryFilter;
use App\Http\Resources\FoodCategoryResource;
use App\Models\FoodCategory;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;

class FoodCategoryController extends Controller
{
    use ApiResponses;
    public function index(FoodCategoryFilter $filters) {
        return FoodCategoryResource::collection(FoodCategory::filter($filters)->paginate());
    }

    public function show(FoodCategory $foodCategory, FoodCategoryFilter $filters) {
        return new FoodCategoryResource($foodCategory->filter($filters)->first());
    }
}
