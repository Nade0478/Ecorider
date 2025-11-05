<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParticipationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupérer des IDs de covoiturages existants
        $covoiturageIds = DB::table('covoiturages')->pluck('id')->toArray();

        // Récupérer des IDs de passagers (utilisateurs avec statut_passager actif)
        $passagerIds = DB::table('users')
            ->where('statut_passager', 'active')
            ->pluck('id')
            ->toArray();

        if (empty($covoiturageIds)) {
            $this->command->warn('Aucun covoiturage trouvé. Assurez-vous d\'exécuter CovoiturageSeeder en premier.');
            return;
        }

        if (empty($passagerIds)) {
            $this->command->warn('Aucun passager trouvé. Assurez-vous d\'exécuter UserSeeder en premier.');
            return;
        }

        DB::table('participations')->insert([
            [
                'covoiturage_id' => $covoiturageIds[0],
                'passager_id' => $passagerIds[0],
                'date_reservation' => now()->subDays(5),
                'credits_utilises' => 35,
                'statut' => 'confirmee',
                'validation_trajet' => false,
                'commentaires' => null,
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(5),
            ],
            [
                'covoiturage_id' => $covoiturageIds[0],
                'passager_id' => $passagerIds[min(1, count($passagerIds) - 1)],
                'date_reservation' => now()->subDays(4),
                'credits_utilises' => 35,
                'statut' => 'confirmee',
                'validation_trajet' => false,
                'commentaires' => 'Merci de me confirmer l\'heure exacte',
                'created_at' => now()->subDays(4),
                'updated_at' => now()->subDays(4),
            ],
            [
                'covoiturage_id' => $covoiturageIds[min(1, count($covoiturageIds) - 1)],
                'passager_id' => $passagerIds[0],
                'date_reservation' => now()->subDays(3),
                'credits_utilises' => 45,
                'statut' => 'confirmee',
                'validation_trajet' => false,
                'commentaires' => null,
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ],
            [
                'covoiturage_id' => $covoiturageIds[min(1, count($covoiturageIds) - 1)],
                'passager_id' => $passagerIds[min(1, count($passagerIds) - 1)],
                'date_reservation' => now()->subDays(2),
                'credits_utilises' => 45,
                'statut' => 'confirmee',
                'validation_trajet' => false,
                'commentaires' => 'J\'ai une valise, est-ce un problème ?',
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
            [
                'covoiturage_id' => $covoiturageIds[min(3, count($covoiturageIds) - 1)],
                'passager_id' => $passagerIds[0],
                'date_reservation' => now()->subDays(10),
                'credits_utilises' => 50,
                'statut' => 'terminee',
                'validation_trajet' => true,
                'commentaires' => 'Excellent trajet, chauffeur très ponctuel !',
                'created_at' => now()->subDays(10),
                'updated_at' => now()->subDays(2),
            ],
            [
                'covoiturage_id' => $covoiturageIds[min(3, count($covoiturageIds) - 1)],
                'passager_id' => $passagerIds[min(1, count($passagerIds) - 1)],
                'date_reservation' => now()->subDays(9),
                'credits_utilises' => 50,
                'statut' => 'terminee',
                'validation_trajet' => true,
                'commentaires' => 'Très bon voyage, je recommande',
                'created_at' => now()->subDays(9),
                'updated_at' => now()->subDays(2),
            ],
            [
                'covoiturage_id' => $covoiturageIds[min(4, count($covoiturageIds) - 1)],
                'passager_id' => $passagerIds[0],
                'date_reservation' => now()->subDays(12),
                'credits_utilises' => 55,
                'statut' => 'terminee',
                'validation_trajet' => true,
                'commentaires' => null,
                'created_at' => now()->subDays(12),
                'updated_at' => now()->subDays(2),
            ],
            [
                'covoiturage_id' => $covoiturageIds[min(2, count($covoiturageIds) - 1)],
                'passager_id' => $passagerIds[min(1, count($passagerIds) - 1)],
                'date_reservation' => now()->subDays(1),
                'credits_utilises' => 40,
                'statut' => 'en_attente',
                'validation_trajet' => false,
                'commentaires' => 'En attente de confirmation du chauffeur',
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ],
            [
                'covoiturage_id' => $covoiturageIds[min(5, count($covoiturageIds) - 1)],
                'passager_id' => $passagerIds[0],
                'date_reservation' => now()->subDays(16),
                'credits_utilises' => 60,
                'statut' => 'annulee',
                'validation_trajet' => false,
                'commentaires' => 'Annulée par le passager - changement de plan',
                'created_at' => now()->subDays(16),
                'updated_at' => now()->subDays(6),
            ],
        ]);
    }
}