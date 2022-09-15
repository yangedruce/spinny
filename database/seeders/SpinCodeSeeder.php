<?php

namespace Database\Seeders;

use App\Models\SpinCode;
use Illuminate\Database\Seeder;

class SpinCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SpinCode::factory()->count(30)->create();
    }
}
