<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $categories = ['FrontEnd', 'BackEnd', 'FullStack', 'Design'];

        foreach ($categories as $category) {
            $type = new Type();
            $type->type = $category;
            $type->color = $faker->hexColor();
            $type->save();
        }
    }
}
