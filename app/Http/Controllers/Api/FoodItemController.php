<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FoodItemResource;
use App\Models\FoodItem;
use Illuminate\Http\Request;

class FoodItemController extends Controller
{
    public function index() {
        return FoodItemResource::collection(FoodItem::with('category')->paginate());
    }

    public function show(FoodItem $foodItem) {
        return new FoodItemResource($foodItem);
    }
}
