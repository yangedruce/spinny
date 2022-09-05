<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserCodeSeeder::class);
        $this->call(GrandPrizeWinnerSeeder::class);
        $this->call(PrizeSeeder::class);
        $this->call(PrizeWinnerSeeder::class);
        $this->call(UserSeeder::class);
    }
}
