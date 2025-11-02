<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FoodItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'Food Item',
            'id' => $this->id,
            'attributes' => [
                'name' => $this->name,
                'description' => $this->when($request->routeIs('food-items.show'), $this->description),
                'price' => $this->price,
                'prepTime' => $this->prep_time,
                'image' => $this->image,
                'createdAt' => $this->created_at,
                'updatedAt' => $this->updated_at
            ],
            'relationships' => [
                'foodCategory' => [
                    'data' => [
                        'type' => 'food category',
                        'id' => $this->food_category_id
                    ],
                    'links' => ['self', 'todo']
                ]
            ],
            'includes' => new FoodCategoryResource($this->whenLoaded('category')),
            'links' => ['self' => route('food-items.show', ['food_item' => $this->id])],
        ];
    }
}
