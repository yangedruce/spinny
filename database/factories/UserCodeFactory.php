<?php

namespace Database\Factories;

use App\Models\UserCode;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserCodeFactory extends Factory
{
    protected $model = UserCode::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_code' => $this->faker->randomNumber(6),
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'validation' => $this->faker->boolean,
        ];
    }
}
