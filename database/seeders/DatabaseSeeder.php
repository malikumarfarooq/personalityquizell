<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            QuizSeeder::class,
            QuestionSeeder::class,
            OptionSeeder::class,
            ResultSeeder::class,
        ]);
    }
}
