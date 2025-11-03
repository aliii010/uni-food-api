<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FoodCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'food category',
            'id' => $this->id,
            'attributes' => [
                'name' => $this->name,
                'description' => $this->when($request->routeIs('food-categories.show'), $this->description)
            ],
            'relationships' => [],
            'includes' => [
                'foodItems' => FoodItemResource::collection($this->whenLoaded('foodItems'))
            ],
            'links' => ['self' => route('food-categories.show', ['food_category' => $this->id])],
        ];
    }
}
