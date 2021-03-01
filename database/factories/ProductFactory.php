<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->randomHtml(1, 1),
            'name' => ucfirst($this->faker->words(3, true)),
            'tags' => implode(',', $this->faker->words(rand(2, 5))),
        ];
    }
}
