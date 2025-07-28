<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        $questions = [
            ['quiz_id' => 1, 'text' => 'When you enter a social gathering, you:', 'order' => 1],
            ['quiz_id' => 1, 'text' => 'When facing a problem, you usually:', 'order' => 2],
            ['quiz_id' => 1, 'text' => 'In your free time, you prefer to:', 'order' => 3],
            ['quiz_id' => 1, 'text' => 'You consider yourself more:', 'order' => 4],
            ['quiz_id' => 1, 'text' => 'When working on a project, you:', 'order' => 5],
        ];

        foreach ($questions as $question) {
            Question::create($question);
        }
    }
}
