<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicule>
 */
class VehiculeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'marque' => fake()->company(),
            'modele' => fake()->word(),
            'date_immatriculation' => fake()->date(),
            'energie' => fake()->randomElement(['essence', 'diesel', 'electrique', 'hybride']),
            'nb_places' => fake()->numberBetween(2, 8),
            'statut_electrique' => fake()->boolean(),
            'couleur' => fake()->safeColorName(),
            'immatriculation' => strtoupper(fake()->bothify('??-####-??')),
        ];
    }
}
