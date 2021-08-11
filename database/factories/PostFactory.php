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
            'title' => $this->faker->unique()->word,
            'content' => $this->faker->paragraph,
            'slug' => $this->faker->unique()->word,
            'image' => $this->faker->imageUrl(),
            'published_at' => now(),
            'user_id' => 1,
            'category_id' => $this->faker->numberBetween(1, 10),
            'created_at' => time() - rand(100, 100000),

        ];
    }
}
