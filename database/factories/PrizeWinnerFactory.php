<?php

namespace Database\Factories;

use App\Models\Code;
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
            'email' => $this->faker->email,
            'shared' => $this->faker->boolean,
            'code_id' => Code::factory()->create()->id,
            'prize_id' => Prize::factory()->create()->id,
        ];
    }
}
