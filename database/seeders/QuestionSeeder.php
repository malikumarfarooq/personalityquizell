<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        $questions = [
            [
                'quiz_id' => 1,
                'text' => 'When you enter a social gathering, you:',
                'order' => 1,
                'type' => 'multiple_choice'
            ],
            [
                'quiz_id' => 1,
                'text' => 'When facing a problem, you usually:',
                'order' => 2,
                'type' => 'multiple_choice'
            ],
            [
                'quiz_id' => 1,
                'text' => 'In your free time, you prefer to:',
                'order' => 3,
                'type' => 'multiple_choice'
            ],
            [
                'quiz_id' => 1,
                'text' => 'You consider yourself more:',
                'order' => 4,
                'type' => 'multiple_choice'
            ],
            [
                'quiz_id' => 1,
                'text' => 'When working on a project, you:',
                'order' => 5,
                'type' => 'multiple_choice'
            ],
        ];

        foreach ($questions as $question) {
            Question::create($question);
        }
    }
}
