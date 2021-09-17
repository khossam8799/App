<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;
use App\Models\City;
use App\Models\Area;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // reference to your factories

        State::factory()
        ->count(4)
        ->create();

        City::factory()
        ->count(8)
        ->create();

        Area::factory()
        ->count(12)
        ->create();

     /* $this->call([
        StateSeeder::class,
        CitySeeder::class,
        AreaSeeder::class
     ]);*/
    }
}
