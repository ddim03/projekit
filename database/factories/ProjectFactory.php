<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'image_path' => 'https://images.unsplash.com/photo-1465056836041-7f43ac27dcb5?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=350&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTY2NTA1MDQ4Ng&ixlib=rb-1.2.1&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=560',
            'slug' => fake()->slug(),
            'description' => fake()->paragraph(),
            'category_id' => random_int(1, 8),
            'user_id' => User::inRandomOrder()->first()->id
        ];
    }
}
