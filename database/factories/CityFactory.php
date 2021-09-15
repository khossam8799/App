<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\city;
use App\Models\State;

class CityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = City::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $statesIds= State::table('states')->select('id')->get();
        return [
            'name' => $this->faker->name(),
            'stateId'=> $this->faker->randomElement($statesIds)->id,
        ];
    }
}
