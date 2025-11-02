<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FoodCategory>
 */
class FoodCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            'Fruits',
            'Vegetables',
            'Grains & Cereals',
            'Dairy Products',
            'Meat & Poultry',
            'Seafood',
            'Snacks & Confectionery',
            'Beverages',
            'Frozen Foods',
            'Spices & Condiments',
            'Bakery',
            'Plant-Based Alternatives',
        ];

        $name = $this->faker->unique()->randomElement($categories);

        return [
            'name' => $name,
            'description' => $this->faker->sentence(12, true) . ' This category includes various types of ' . strtolower($name) . '.',
        ];
    }
}
