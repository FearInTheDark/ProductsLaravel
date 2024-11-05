<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        $categories = Category::all();
        return [
            'productName' => $this->faker->jobTitle(),
            'price' => $this->faker->numberBetween(10000, 50000),
            'quantity' => $this->faker->randomNumber(3),
            'category_Id' => $categories->random()->id,
            'image' => $this->faker->imageUrl(640, 480, 'animals'),
        ];
    }
}
