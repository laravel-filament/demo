<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'birthday' => $this->faker->date,
            'email' => $this->faker->email,
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'title' => $this->faker->title,
        ];
    }
}
