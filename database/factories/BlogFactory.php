<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'news_date'=>fake()->date($format = 'Y-m-d',$max = 'now'),
            'title'=>fake()->realText(20),
            // 'image'=>'/images/admin/sample1.jpg',
            'body'=>fake()->realText(200),
            'category_id'=>fake()->numberBetween(1,5),
            'user_id'=>User::factory(),
        ];
    }
}
