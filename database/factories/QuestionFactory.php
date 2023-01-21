<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{

    public static $subjects = array('Maths', 'English', 'Parmacology', 'Biology', 'Government', 'hemotology', 'Philosophy');
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'question' => fake()->sentence(20),
            'tags' =>  join(', ', array_rand(array_flip($this::$subjects), 3)),
            'user_id' => rand(1, 7),
            'anonymous' => boolval(rand(0, 1))
        ];
    }
}
