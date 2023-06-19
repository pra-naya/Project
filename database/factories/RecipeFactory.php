<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(3),
            // 'tags' => 'asian, nepali, newari',
            'n_value'=> 'protein: 45gms',
            // 'author' => $this->faker->name(),
            'ingredients' => $this->faker->paragraph(5),
            'steps' => $this->faker->paragraph(8),
            'user_id' => $this->faker->numberBetween(1, 5)
        ];
    }
}
