<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    public function run()
    {
        $options = [
            // Question 1 options
            ['question_id' => 1, 'text' => 'Make a loud entrance', 'score' => 3, 'is_active' => true],
            ['question_id' => 1, 'text' => 'Enter quietly and look for someone you know', 'score' => 2, 'is_active' => true],
            ['question_id' => 1, 'text' => 'Stay on the sidelines and observe first', 'score' => 1, 'is_active' => true],

            // Question 2 options
            ['question_id' => 2, 'text' => 'Trust your instincts and go with your gut', 'score' => 3, 'is_active' => true],
            ['question_id' => 2, 'text' => 'Analyze the situation carefully', 'score' => 2, 'is_active' => true],
            ['question_id' => 2, 'text' => 'Seek advice from others', 'score' => 1, 'is_active' => true],

            // Question 3 options
            ['question_id' => 3, 'text' => 'Spend time with friends', 'score' => 3, 'is_active' => true],
            ['question_id' => 3, 'text' => 'Read a book or pursue a hobby', 'score' => 2, 'is_active' => true],
            ['question_id' => 3, 'text' => 'Relax and do nothing in particular', 'score' => 1, 'is_active' => true],

            // Question 4 options
            ['question_id' => 4, 'text' => 'Creative and imaginative', 'score' => 3, 'is_active' => true],
            ['question_id' => 4, 'text' => 'Logical and practical', 'score' => 2, 'is_active' => true],
            ['question_id' => 4, 'text' => 'A mix of both', 'score' => 1, 'is_active' => true],

            // Question 5 options
            ['question_id' => 5, 'text' => 'Prefer to work alone', 'score' => 3, 'is_active' => true],
            ['question_id' => 5, 'text' => 'Enjoy collaborating with others', 'score' => 2, 'is_active' => true],
            ['question_id' => 5, 'text' => 'It depends on the project', 'score' => 1, 'is_active' => true],
        ];

        foreach ($options as $option) {
            Option::create($option);
        }
    }
}
