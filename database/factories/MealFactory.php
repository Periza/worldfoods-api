<?php

namespace Database\Factories;

use \App\Models\Meal;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meals>
 */
class MealFactory extends Factory
{
    protected $model = Meal::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Start date for creation
        $start = $this->faker->dateTimeBetween('now -7 days', 'now');
        return [
            'created_at' => $start,
            'updated_at' => $this->faker->dateTimeBetween($start, 'now +7 days'),
            'category_id' => random_int(1,100)
        ];
    }
}
