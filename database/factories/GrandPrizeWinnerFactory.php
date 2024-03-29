<?php

namespace Database\Factories;

use App\Models\SpinCode;
use App\Models\PrizeWinner;
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
            'month' => $this->faker->month,
            'spin_code_id' => SpinCode::factory()->create()->id,
            'prize_winner_id' => PrizeWinner::factory()->create()->id,
        ];
    }
}
