<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employe>
 */
class EmployeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pseudo' => fake()->unique()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => bcrypt('password'),
            'remember_token' => \Illuminate\Support\Str::random(10),
            'statut_suspendu' => false,
        ];
    }
}
