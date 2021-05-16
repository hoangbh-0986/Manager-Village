<?php

namespace Database\Factories;

use App\Models\DetailCraftVillage;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetailCraftVillageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DetailCraftVillage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'craft_village_id' => mt_rand(1, 10),
            'acreage' => mt_rand(900, 2000),
            'total_family' => mt_rand(90, 200),
            'total_people' => mt_rand(200, 900),
            'total_employees' => mt_rand(100, 500),
            'total_income' => mt_rand(1000000, 5000000),
            'average income' => mt_rand(100000, 500000),
        ];
    }
}
