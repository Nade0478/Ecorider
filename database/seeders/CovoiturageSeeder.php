<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CovoiturageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupérer des IDs de chauffeurs existants
        $chauffeurIds = DB::table('users')
            ->where('statut_chauffeur', 'active')
            ->pluck('id')
            ->toArray();

        if (empty($chauffeurIds)) {
            $this->command->warn('Aucun chauffeur trouvé. Assurez-vous d\'exécuter UserSeeder en premier.');
            return;
        }

        DB::table('covoiturages')->insert([
            [
                'ville_depart' => 'Paris',
                'ville_arrivee' => 'Lyon',
                'date_depart' => now()->addDays(2)->setTime(8, 0),
                'date_arrivee' => now()->addDays(2)->setTime(13, 0),
                'places_disponibles' => 4,
                'places_restantes' => 4,
                'prix' => 35.50,
                'statut' => 'disponible',
                'statut_ecologique' => 'eco',
                'chauffeur_id' => $chauffeurIds[0],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ville_depart' => 'Paris',
                'ville_arrivee' => 'Marseille',
                'date_depart' => now()->addDays(5)->setTime(9, 30),
                'date_arrivee' => now()->addDays(5)->setTime(18, 0),
                'places_disponibles' => 3,
                'places_restantes' => 1,
                'prix' => 45.00,
                'statut' => 'disponible',
                'statut_ecologique' => 'standard',
                'chauffeur_id' => $chauffeurIds[0],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ville_depart' => 'Lyon',
                'ville_arrivee' => 'Bordeaux',
                'date_depart' => now()->addDays(3)->setTime(14, 0),
                'date_arrivee' => now()->addDays(3)->setTime(19, 30),
                'places_disponibles' => 4,
                'places_restantes' => 3,
                'prix' => 40.00,
                'statut' => 'disponible',
                'statut_ecologique' => 'eco',
                'chauffeur_id' => $chauffeurIds[min(1, count($chauffeurIds) - 1)],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ville_depart' => 'Toulouse',
                'ville_arrivee' => 'Paris',
                'date_depart' => now()->addDays(7)->setTime(7, 0),
                'date_arrivee' => now()->addDays(7)->setTime(14, 30),
                'places_disponibles' => 3,
                'places_restantes' => 0,
                'prix' => 50.00,
                'statut' => 'complet',
                'statut_ecologique' => 'standard',
                'chauffeur_id' => $chauffeurIds[0],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ville_depart' => 'Nice',
                'ville_arrivee' => 'Paris',
                'date_depart' => now()->subDays(2)->setTime(10, 0),
                'date_arrivee' => now()->subDays(2)->setTime(19, 0),
                'places_disponibles' => 4,
                'places_restantes' => 0,
                'prix' => 55.00,
                'statut' => 'termine',
                'statut_ecologique' => 'eco',
                'chauffeur_id' => $chauffeurIds[min(1, count($chauffeurIds) - 1)],
                'created_at' => now()->subDays(10),
                'updated_at' => now()->subDays(2),
            ],
            [
                'ville_depart' => 'Strasbourg',
                'ville_arrivee' => 'Nantes',
                'date_depart' => now()->subDays(5)->setTime(6, 30),
                'date_arrivee' => now()->subDays(5)->setTime(16, 0),
                'places_disponibles' => 3,
                'places_restantes' => 1,
                'prix' => 60.00,
                'statut' => 'annule',
                'statut_ecologique' => 'standard',
                'chauffeur_id' => $chauffeurIds[0],
                'created_at' => now()->subDays(15),
                'updated_at' => now()->subDays(6),
            ],
        ]);
    }
}