<?php

namespace Database\Seeders;

use App\Models\Result;
use Illuminate\Database\Seeder;

class ResultSeeder extends Seeder
{
    public function run()
    {
        $results = [
            [
                'quiz_id' => 1,
                'title' => 'The Visionary',
                'description' => 'You are a creative thinker who sees the big picture. You thrive on new ideas and possibilities, often inspiring others with your vision.',
                'min_score' => 12,
                'max_score' => 15,
                'traits' => "Innovative\nImaginative\nFuture-oriented\nInspirational",
                'image_path' => 'images/results/visionary.jpg'
            ],
            [
                'quiz_id' => 1,
                'title' => 'The Analyst',
                'description' => 'You are logical, detail-oriented, and methodical. You excel at breaking down complex problems and finding practical solutions.',
                'min_score' => 8,
                'max_score' => 11,
                'traits' => "Logical\nDetail-oriented\nPractical\nSystematic",
                'image_path' => 'images/results/analyst.jpg'
            ],
            [
                'quiz_id' => 1,
                'title' => 'The Diplomat',
                'description' => 'You are empathetic and relationship-focused. You excel at understanding others and creating harmony in groups.',
                'min_score' => 5,
                'max_score' => 7,
                'traits' => "Empathetic\nHarmonious\nSupportive\nGood listener",
                'image_path' => 'images/results/diplomat.jpg'
            ],
        ];

        foreach ($results as $result) {
            Result::create($result);
        }
    }
}
