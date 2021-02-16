<?php

namespace Database\Factories;

use App\Filament\Resources\CustomerResource;
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
        $titleOptions = array_keys(CustomerResource::$titleOptions);

        return [
            'birthday' => $this->faker->date,
            'email' => $this->faker->email,
            'name' => "{$this->faker->firstName} {$this->faker->lastName}",
            'phone' => $this->faker->phoneNumber,
            'title' => $titleOptions[rand(0, count($titleOptions) - 1)],
        ];
    }
}
