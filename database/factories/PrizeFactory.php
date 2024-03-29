<?php

namespace Database\Factories;

use App\Models\Prize;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrizeFactory extends Factory
{
    protected $model = Prize::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->randomNumber(6),
            'name' => $this->faker->name,
            'total_count' => $this->faker->randomNumber(3),
            'remaining' => $this->faker->randomNumber(2),
        ];
    }
}
