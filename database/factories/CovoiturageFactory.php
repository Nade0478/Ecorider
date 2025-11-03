<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Covoiturage>
 */
class CovoiturageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_depart' => fake()->dateTimeBetween('+1 days', '+1 month'),
            'heure_depart' => fake()->time(),
            'date_arrivee' => fake()->dateTimeBetween('+1 days', '+1 month'),
            'heure_arrivee' => fake()->time(),
            'ville_depart' => fake()->city(),
            'ville_arrivee' => fake()->city(),
            'places_disponibles' => fake()->numberBetween(1, 6),
            'prix' => fake()->randomFloat(2, 5, 100),
            'description' => fake()->sentence(),
            'statut' => 'active',
            'statut_ecologique' => fake()->boolean(30),
        ];
    }
}
