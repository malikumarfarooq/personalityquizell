<?php

namespace Database\Seeders;

use App\Models\Result;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ResultSeeder extends Seeder
{
    public function run()
    {
        // Solution 1: Use existing user or create with unique email
        $user = User::first();

        if (!$user) {
            $user = User::create([
                'name' => 'Test User',
                'email' => 'test_' . Str::random(8) . '@example.com', // Unique email
                'password' => bcrypt('password')
            ]);
        }

        // Solution 2: Clear existing results for this user/quiz combo
        Result::where('user_id', $user->id)
            ->where('quiz_id', 1)
            ->delete();

        $results = [
            [
                'user_id' => $user->id,
                'quiz_id' => 1,
                'title' => 'The Visionary',
                'description' => 'You are a creative thinker who sees the big picture...',
                'min_score' => 12,
                'max_score' => 15,
                'traits' => ["Innovative", "Imaginative", "Future-oriented", "Inspirational"],
                'image_path' => 'images/results/visionary.jpg',
                'answers' => null,
                'is_paid' => false
            ],
            [
                'user_id' => $user->id,
                'quiz_id' => 1,
                'title' => 'The Analyst',
                'description' => 'You are logical, detail-oriented, and methodical...',
                'min_score' => 8,
                'max_score' => 11,
                'traits' => ["Logical", "Detail-oriented", "Practical", "Systematic"],
                'image_path' => 'images/results/analyst.jpg',
                'answers' => null,
                'is_paid' => false
            ],
            [
                'user_id' => $user->id,
                'quiz_id' => 1,
                'title' => 'The Diplomat',
                'description' => 'You are empathetic and relationship-focused...',
                'min_score' => 5,
                'max_score' => 7,
                'traits' => ["Empathetic", "Harmonious", "Supportive", "Good listener"],
                'image_path' => 'images/results/diplomat.jpg',
                'answers' => null,
                'is_paid' => false
            ],
        ];

        // Solution 3: Use updateOrCreate to prevent duplicates
        foreach ($results as $result) {
            Result::updateOrCreate(
                [
                    'user_id' => $result['user_id'],
                    'quiz_id' => $result['quiz_id'],
                    'title' => $result['title']
                ],
                $result
            );
        }
    }
}
