<?php

namespace Database\Factories;

use App\Models\CraftVillage;
use Illuminate\Database\Eloquent\Factories\Factory;

class CraftVillageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CraftVillage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'create_year' => now(),
            'email' => $this->faker->email,
            'ward_id' => mt_rand(1, 10),
        ];
    }
}
