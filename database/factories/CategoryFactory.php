<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class CategoryFactory extends Factory
{

    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->randomElement([
                'كتب عربية ',
                'كتب انجليزية',
                'كتب برمجة ',
                ' كتب تاريخية ',
                'كتب دينية',
            ]),
        ];
    }
}
