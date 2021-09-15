<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Area;


class AreaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = areas::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $statesIds= City::table('states')->select('id')->get();
        return [
            'name' => $this->faker->name(),
            'state_id'=> $this->faker->randomElement($statesIds)->id
        ];
    }
}
