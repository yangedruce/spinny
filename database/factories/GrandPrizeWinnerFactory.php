<?php

namespace Database\Factories;

use App\Models\Code;
use App\Models\GrandPrizeWinner;
use Illuminate\Database\Eloquent\Factories\Factory;

class GrandPrizeWinnerFactory extends Factory
{
    protected $model = GrandPrizeWinner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->email,
            'month' => $this->faker->month,
            'code_id' => Code::factory()->create()->id,
        ];
    }
}
