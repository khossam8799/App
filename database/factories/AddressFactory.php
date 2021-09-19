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
            'street' => $this->faker->name(),
            'building'=> $this->faker->name(),
            'floor'=> $this->faker->unsigndIntger(),
            'apartment'=> $this->faker->unsigndIntger(),
            'street' => $this->faker->name(),
            'areaId' => Area::inRandomOrder()->value('id')
        ];
    }
}
