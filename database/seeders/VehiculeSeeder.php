<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehiculeSeeder extends Seeder
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

        DB::table('vehicules')->insert([
            [
                'marque' => 'Renault',
                'modele' => 'Clio V',
                'couleur' => 'Bleu',
                'type_carburant' => 'essence',
                'immatriculation' => 'AB-123-CD',
                'date_premiere_immatriculation' => '2022-03-15',
                'nombre_places' => 4,
                'statut_ecologique' => 'eco',
                'proprietaire_id' => $chauffeurIds[0],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'marque' => 'Peugeot',
                'modele' => '308',
                'couleur' => 'Gris',
                'type_carburant' => 'diesel',
                'immatriculation' => 'EF-456-GH',
                'date_premiere_immatriculation' => '2020-07-20',
                'nombre_places' => 5,
                'statut_ecologique' => 'standard',
                'proprietaire_id' => $chauffeurIds[0],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'marque' => 'Tesla',
                'modele' => 'Model 3',
                'couleur' => 'Blanc',
                'type_carburant' => 'electrique',
                'immatriculation' => 'IJ-789-KL',
                'date_premiere_immatriculation' => '2023-01-10',
                'nombre_places' => 5,
                'statut_ecologique' => 'eco',
                'proprietaire_id' => $chauffeurIds[min(1, count($chauffeurIds) - 1)],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'marque' => 'Citroën',
                'modele' => 'C4',
                'couleur' => 'Rouge',
                'type_carburant' => 'essence',
                'immatriculation' => 'MN-012-OP',
                'date_premiere_immatriculation' => '2021-11-05',
                'nombre_places' => 5,
                'statut_ecologique' => 'standard',
                'proprietaire_id' => $chauffeurIds[min(1, count($chauffeurIds) - 1)],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'marque' => 'Volkswagen',
                'modele' => 'Golf',
                'couleur' => 'Noir',
                'type_carburant' => 'diesel',
                'immatriculation' => 'QR-345-ST',
                'date_premiere_immatriculation' => '2019-05-18',
                'nombre_places' => 5,
                'statut_ecologique' => 'standard',
                'proprietaire_id' => $chauffeurIds[0],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'marque' => 'BMW',
                'modele' => 'i3',
                'couleur' => 'Argent',
                'type_carburant' => 'electrique',
                'immatriculation' => 'UV-678-WX',
                'date_premiere_immatriculation' => '2022-09-12',
                'nombre_places' => 4,
                'statut_ecologique' => 'eco',
                'proprietaire_id' => $chauffeurIds[min(1, count($chauffeurIds) - 1)],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'marque' => 'Toyota',
                'modele' => 'Prius',
                'couleur' => 'Vert',
                'type_carburant' => 'hybride',
                'immatriculation' => 'YZ-901-AB',
                'date_premiere_immatriculation' => '2021-04-22',
                'nombre_places' => 5,
                'statut_ecologique' => 'eco',
                'proprietaire_id' => $chauffeurIds[0],
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}