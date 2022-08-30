<?php

namespace Database\Seeders;

use App\Models\GrandPrizeWinner;
use Illuminate\Database\Seeder;

class GrandPrizeWinnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GrandPrizeWinner::factory()->count(10)->create();
    }
}
