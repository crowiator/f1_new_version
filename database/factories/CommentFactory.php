<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'post_id'=>1,
            'user_id'=>1,
            'text' =>$this->faker->paragraph(2,true),
        ];
    }
}
