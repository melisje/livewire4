<?php

namespace Database\Factories\Production;

use App\Models\Checklist;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Checklist>
 */
class ChecklistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(3), // Genereert een titel van 3 woorden
            'remarks' => fake()->paragraph(), // Genereert een willekeurige beschrijving
        ];
    }
}
