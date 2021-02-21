<?php

namespace Database\Factories;

use App\Models\Good;
use Illuminate\Database\Eloquent\Factories\Factory;

class GoodFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Good::class;

    /**
     * Define the model's default state.
     *
     * @param $faker
     * @return array
     */
    public function definition($faker)
    {
        return [
            'title' => $faker->word,
            'description' => $faker->text,
            'category_id' => mt_rand(1, 5),
            'price' => 10 * round(0.1 * mt_rand(100, 1000)),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
}
