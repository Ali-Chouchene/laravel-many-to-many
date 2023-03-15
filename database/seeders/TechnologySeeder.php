<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $types = ['HTML', 'CSS', 'JS', 'VUE', 'PHP', 'SCSS'];

        foreach ($types as $type) {
            $tech = new Technology();
            $tech->name = $type;
            $tech->color = $faker->hexColor();
            $tech->save();
        }
    }
}
