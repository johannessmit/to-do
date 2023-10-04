<?php

namespace Database\Factories\Todo;

use App\Models\Todo\Priority;
use App\Models\Todo\Todo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'todo' => fake()->sentence(),
            'priority' => $this->getRandomPriority(),
            'due_date' => fake()->dateTime(),
            'done' => fake()->boolean(),
        ];
    }

    private function getRandomPriority(?Priority $priority = null): Priority
    {
        if ($priority !== null) {
            return $priority;
        }

        $priorityCases = Priority::cases();

        $index = fake()->numberBetween(
            0,
            count($priorityCases) - 1
        );

        return $priorityCases[$index];

    }
}
