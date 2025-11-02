<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FoodCategory;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;

class FoodCategoryController extends Controller
{
    use ApiResponses;
    public function index() {
        return $this->ok(FoodCategory::paginate(), '');        
    }
}
