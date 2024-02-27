<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Visitor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visitor>
 */
class VisitorFactory extends Factory
{
    protected $model = Visitor::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dui' => $this->faker->unique()->numerify('########-#'),
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'birthdate' => $this->faker->date,
            'phone' => $this->faker->phoneNumber,
        ];
    }
}
