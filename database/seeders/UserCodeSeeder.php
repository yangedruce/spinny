<?php

namespace Database\Seeders;

use App\Models\UserCode;
use Illuminate\Database\Seeder;

class UserCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserCode::factory()->count(30)->create();
    }
}
