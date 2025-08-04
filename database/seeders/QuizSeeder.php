<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    public function run()
    {
        Quiz::create([
            'title' => 'Personality Insights Quiz',
            'description' => 'Discover your personality traits with this comprehensive quiz',
            'is_active' => true,
            'duration' => 30, // minutes
            'passing_score' => 5,
        ]);
    }
}
