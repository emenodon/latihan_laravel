<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tittle' => $this->faker->title(),
            'photo' => 'https://via.placeholder.com/150',
            'description' => 'gw ganteng bat',
            'is_active' => 1
        ];
    }
}
