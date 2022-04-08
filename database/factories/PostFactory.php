<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'title' => $this->faker->name(),
            'description' => $this->faker->text(),
            'category_id' =>$this->faker->numberBetween($min = 1, $max = 6),
            'age_id' =>$this->faker->numberBetween($min = 1, $max = 5),
            'image' => '<img src="https://picsum.photos/150/150?random" alt="">',
            'featured' => $this->faker->boolean(),

        ];
    }
}
