<?php

namespace Database\Seeders;

use Database\Factories\StatesFactory;
use Illuminate\Database\Seeder;
use App\Models\State;

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

       // \App\Models\State::factory(10)->create();
      //  \App\Models\City::factory(10)->create();
      //  \App\Models\Area::factory(10)->create();
      $this->call([
        StateSeeder::class,
        CitySeeder::class,
        AreaSeeder::class,
    ]);
    }
}
