<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FoodCategoryResource;
use App\Models\FoodCategory;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;

class FoodCategoryController extends Controller
{
    use ApiResponses;
    public function index() {
        return FoodCategoryResource::collection(FoodCategory::paginate());
    }

    public function show(FoodCategory $foodCategory) {
        if (request()->has('include')) {
            $foodCategory->load(request()->input('include'));
        }

        return new FoodCategoryResource($foodCategory);
    }
}
