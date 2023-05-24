<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $languages = ['PHP', 'JavaScript', 'Python', 'Ruby', 'Java', 'C#'];
        $frameworks = ['Laravel', 'React', 'Angular', 'Vue.js', 'Django', 'Ruby on Rails'];

        for ($i = 0; $i <= 10; $i++) {
            $project = new Project();

            $project->title = $faker->text(50);
            $project->type = $faker->randomElement(array_merge($languages, $frameworks));
            $project->content = $faker->text(100);
            $project->slug = Str::slug($project->title, '-');

            $project->save();
        }
    }
}
