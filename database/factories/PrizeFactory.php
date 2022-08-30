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
            'prize_code' => $this->faker->randomNumber(6),
            'prize_name' => $this->faker->name,
            'total_count' => 10,
            'remaining' => 2,
        ];
    }
}
