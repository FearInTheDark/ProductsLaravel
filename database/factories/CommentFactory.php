<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        $faker = FakerFactory::create('en_US');
        $users = User::all();
        $products = Product::all();
        return [
            'user_id' => $users->random()->id,
            'product_id' => $products->random()->id,
            'content' => $faker->paragraph(5, true),
        ];
    }
}
