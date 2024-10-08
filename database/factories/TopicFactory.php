<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Topic>
 */
class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 帖子工厂
            'user_id' => User::inRandomOrder()->first(), // 随机取一个用户
            'title' => fake()->sentence(20),
            'content' => fake()->sentence(20)
        ];
    }
}
