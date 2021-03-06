<?php

namespace Database\Seeders;

use App\Models\city;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::factory()
        ->count(5)
        ->create();
    }
}
