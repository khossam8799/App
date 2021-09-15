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
State::factory(10)->create();

    }
}
