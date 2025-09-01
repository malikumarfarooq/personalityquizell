<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
//    public function run()
//    {
//        Quiz::create([
//            'title' => 'Personality Insights Quiz',
//            'description' => 'Discover your personality traits with this comprehensive quiz',
//            'is_active' => true,
//            'duration' => 30, // minutes
//            'passing_score' => 5,
//        ]);
//    }

    public function run()
    {
        $quizzes = [
            [
                'title' => 'Personality Insights Quiz',
                'description' => 'Discover your personality traits with this comprehensive quiz',
                'is_active' => true,
                'status' => 'active',
                'duration' => 30,
                'passing_score' => 5,
            ],
            [
                'title' => 'Career Guidance Quiz',
                'description' => 'Find your ideal career path based on your skills and interests',
                'is_active' => false,
                'status' => 'draft',
                'duration' => 25,
                'passing_score' => 6,
            ],
            // Add more sample quizzes
        ];

        foreach ($quizzes as $quiz) {
            Quiz::create($quiz);
        }
    }
}
