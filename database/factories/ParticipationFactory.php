<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Participation>
 */
class ParticipationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_reservation' => fake()->date(),
            'credits_utilises' => fake()->numberBetween(10, 100),
            'validation_trajet' => fake()->boolean(),
            'commentaire' => fake()->sentence(),
            'statut' => 'confirmee',
        ];
    }
}
