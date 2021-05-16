<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Expert::factory(20)->create();
        \App\Models\Ward::factory(10)->create();
        \App\Models\CraftVillage::factory(10)->create();
        \App\Models\Job::factory(10)->create();
        \App\Models\DetailCraftVillage::factory(10)->create();
    }
}
