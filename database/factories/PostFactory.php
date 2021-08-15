<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(rand(4,10)),
            'content' => $this->faker->paragraph,
            'slug' => $this->faker->unique()->word,
            'image' => null,
            'published_at' => now(),
            'user_id' => 1,
            'category_id' => $this->faker->numberBetween(1, 10),

        ];
    }
}
