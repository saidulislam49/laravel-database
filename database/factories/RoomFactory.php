<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'room_number' => fake()->unique()->numberBetween(100, 300),
            'room_size' => fake()->numberBetween(1, 5),
            'price' => fake()->numberBetween(100, 600),
            'description' => fake()->text(1000)
        ];
    }
}