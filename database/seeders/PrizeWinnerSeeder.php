<?php

namespace Database\Seeders;

use App\Models\PrizeWinner;
use Illuminate\Database\Seeder;

class PrizeWinnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PrizeWinner::factory()->count(20)->create();
    }
}
