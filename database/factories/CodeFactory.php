<?php

namespace Database\Factories;

use App\Models\Code;
use Illuminate\Database\Eloquent\Factories\Factory;

class CodeFactory extends Factory
{
    protected $model = Code::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_code' => $this->faker->randomNumber(6),
            'email' => $this->faker->email,
            'validation' => $this->faker->boolean,
        ];
    }
}
