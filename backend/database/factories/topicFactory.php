<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //Wpisuje lorem ipsum i przykładowe dane do tabeli
        return [
            
            'title' => $this->faker->unique()->sentence(),
            'created_at' => now()
        ];
    }
}
