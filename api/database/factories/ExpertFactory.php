<?php

namespace Database\Factories;

use App\Models\Expert;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpertFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Expert::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'year_of_birth' => now(),
            'year_died' => now(),
            'craft_village_id' => mt_rand(1, 10),
            'job_id' => mt_rand(1, 10),
        ];
    }
}
