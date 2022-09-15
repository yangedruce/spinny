<?php

namespace Database\Factories;

use App\Models\SpinCode;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpinCodeFactory extends Factory
{
    protected $model = SpinCode::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->randomNumber(6),
            'validation' => false,
        ];
    }
}
