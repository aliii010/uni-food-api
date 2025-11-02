<?php

namespace Database\Factories;

use App\Models\FoodCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FoodItem>
 */
class FoodItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Example sets of items categorized for realism
        $menu = [
            'Fruits' => ['Apple', 'Banana', 'Mango', 'Orange', 'Pineapple'],
            'Vegetables' => ['Carrot', 'Broccoli', 'Spinach', 'Cucumber', 'Potato'],
            'Dairy Products' => ['Cheddar Cheese', 'Greek Yogurt', 'Butter', 'Milk', 'Cottage Cheese'],
            'Meat & Poultry' => ['Grilled Chicken', 'Beef Steak', 'Turkey Breast', 'Lamb Chops'],
            'Seafood' => ['Salmon Fillet', 'Shrimp Cocktail', 'Tuna Steak', 'Crab Cakes'],
            'Snacks & Confectionery' => ['Chocolate Bar', 'Potato Chips', 'Cookies', 'Trail Mix'],
            'Beverages' => ['Lemonade', 'Iced Coffee', 'Smoothie', 'Green Tea'],
            'Bakery' => ['Croissant', 'Bagel', 'Blueberry Muffin', 'Sourdough Bread'],
            'Spices & Condiments' => ['Black Pepper', 'Paprika', 'Olive Oil', 'Soy Sauce'],
            'Frozen Foods' => ['Frozen Pizza', 'Ice Cream', 'Vegetable Mix', 'Fish Fingers'],
        ];

        // Get or create a category
        $category = FoodCategory::inRandomOrder()->first() ?? FoodCategory::factory()->create();

        // Choose a name based on the category for realism
        $name = $this->faker->randomElement($menu[$category->name] ?? ['Special Dish']);

        return [
            'name' => $name,
            'description' => $this->faker->sentence(15, true) . " Made with fresh ingredients in the {$category->name} category.",
            'price' => $this->faker->randomFloat(2, 2.50, 45.00),
            'food_category_id' => $category->id,
            'prep_time' => $this->faker->numberBetween(5, 60), // in minutes
            'image' => $this->faker->imageUrl(640, 480, 'food', true, $name),
        ];
    }
}
