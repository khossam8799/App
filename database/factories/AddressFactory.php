<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Area;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'street' => $this->faker->word(),
            'building'=> $this->faker->word(),
            'floor'=> $this->faker->randomNumber(),
            'apartment'=> $this->faker->randomNumber(),
            'landmark' => $this->faker->word(),
            'areaId' => Area::inRandomOrder()->value('id')
        ];
    }
}
