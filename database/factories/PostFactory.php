<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->words(5,true);
        return [
            //
            'user_id' => 1,
            'title' => ucfirst($title),
            'text' => $this->faker->paragraphs(3,true),
        ];
    }
}
