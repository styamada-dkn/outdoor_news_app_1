<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class InquiryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'name_kana' => fake()->kanaName(),
            'tel' => fake()->phoneNumber(),
            'email' => fake()->safeEmail(),
            'body' => fake()->realText(200),
        ];
    }
}
