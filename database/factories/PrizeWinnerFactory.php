<?php

namespace Database\Factories;

use App\Models\SpinCode;
use App\Models\Prize;
use App\Models\PrizeWinner;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrizeWinnerFactory extends Factory
{
    protected $model = PrizeWinner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    { 
        return [
            'shared' => $this->faker->boolean,
            'spin_code_id' => SpinCode::factory()->create()->id,
            'prize_id' => Prize::factory()->create()->id,
        ];
    }
}
