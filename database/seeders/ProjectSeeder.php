<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $type_ids = Type::select('id')->pluck('id')->toArray();
        $type_ids[] = null;

        for ($i = 0; $i < 0; $i++) {
            $project = new Project();
            $project->type_id = Arr::random($type_ids);
            $project->status = $faker->boolean();
            $project->name = $faker->text(10);
            $project->description = $faker->paragraphs(10, true);
            $project->link = $faker->url();
            $project->save();
        }
    }
}
