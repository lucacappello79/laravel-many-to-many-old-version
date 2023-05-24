<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $technologies = ['PHP', 'HTML', 'Figma', 'MySQL', 'JS', 'CSS', 'Sass', 'Postman', 'VS Code'];

        foreach ($technologies as $item) {
            $newTechnology = new Technology();

            $newTechnology->name = $item;
            $newTechnology->slug = Str::slug($newTechnology->name, '-');
            $newTechnology->color = $faker->hexColor();

            $newTechnology->save();
        }
    }
}
