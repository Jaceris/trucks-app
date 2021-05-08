<?php

namespace Database\Factories;

use App\Models\Truck;
use Illuminate\Database\Eloquent\Factories\Factory;

class TruckFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Truck::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'brand'        => array_rand(config('truck.brands'), 1),
            'year'         => $this->faker->numberBetween(config('truck.min_year'), date("Y")),
            'owner'        => $this->faker->name(),
            'owners_count' => $this->faker->optional()->numberBetween(1, 10),
            'comments'     => $this->faker->optional()->text(50),
        ];
    }
}
