<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AvisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupérer des IDs nécessaires
        $userIds = DB::table('users')->pluck('id')->toArray();
        $covoiturageIds = DB::table('covoiturages')->pluck('id')->toArray();

        // Récupérer un validateur (peut être un admin ou employé)
        $validateurId = DB::table('users')->first()->id ?? null;

        if (empty($userIds) || empty($covoiturageIds) || !$validateurId) {
            $this->command->warn('Données manquantes. Assurez-vous d\'exécuter UserSeeder et CovoiturageSeeder en premier.');
            return;
        }

        DB::table('avis')->insert([
            // Avis validés et positifs
            [
                'auteur_id' => $userIds[0],
                'validateur_id' => $validateurId,
                'covoiturage_id' => $covoiturageIds[0],
                'concerne_id' => $userIds[min(1, count($userIds) - 1)],
                'note' => 5,
                'commentaire' => 'Excellent chauffeur ! Très ponctuel et conduite agréable.',
                'statut_valide' => true,
                'date_validation' => now()->subDays(3),
                'created_at' => now()->subDays(4),
                'updated_at' => now()->subDays(3),
            ],
            [
                'auteur_id' => $userIds[min(1, count($userIds) - 1)],
                'validateur_id' => $validateurId,
                'covoiturage_id' => $covoiturageIds[0],
                'concerne_id' => $userIds[0],
                'note' => 5,
                'commentaire' => 'Passager sympathique et respectueux. Je recommande !',
                'statut_valide' => true,
                'date_validation' => now()->subDays(3),
                'created_at' => now()->subDays(4),
                'updated_at' => now()->subDays(3),
            ],
            [
                'auteur_id' => $userIds[0],
                'validateur_id' => $validateurId,
                'covoiturage_id' => $covoiturageIds[min(1, count($covoiturageIds) - 1)],
                'concerne_id' => $userIds[min(1, count($userIds) - 1)],
                'note' => 4,
                'commentaire' => 'Très bon trajet, juste un petit retard au départ.',
                'statut_valide' => true,
                'date_validation' => now()->subDays(5),
                'created_at' => now()->subDays(6),
                'updated_at' => now()->subDays(5),
            ],
            [
                'auteur_id' => $userIds[min(1, count($userIds) - 1)],
                'validateur_id' => $validateurId,
                'covoiturage_id' => $covoiturageIds[min(1, count($covoiturageIds) - 1)],
                'concerne_id' => $userIds[0],
                'note' => 5,
                'commentaire' => 'Passager agréable, bonne conversation durant le trajet.',
                'statut_valide' => true,
                'date_validation' => now()->subDays(5),
                'created_at' => now()->subDays(6),
                'updated_at' => now()->subDays(5),
            ],

            // Avis moyens validés
            [
                'auteur_id' => $userIds[0],
                'validateur_id' => $validateurId,
                'covoiturage_id' => $covoiturageIds[min(2, count($covoiturageIds) - 1)],
                'concerne_id' => $userIds[min(2, count($userIds) - 1)],
                'note' => 3,
                'commentaire' => 'Trajet correct mais la voiture n\'était pas très propre.',
                'statut_valide' => true,
                'date_validation' => now()->subDays(7),
                'created_at' => now()->subDays(8),
                'updated_at' => now()->subDays(7),
            ],
            [
                'auteur_id' => $userIds[min(2, count($userIds) - 1)],
                'validateur_id' => $validateurId,
                'covoiturage_id' => $covoiturageIds[min(2, count($covoiturageIds) - 1)],
                'concerne_id' => $userIds[0],
                'note' => 4,
                'commentaire' => 'Bon passager, RAS.',
                'statut_valide' => true,
                'date_validation' => now()->subDays(7),
                'created_at' => now()->subDays(8),
                'updated_at' => now()->subDays(7),
            ],

            // Avis en attente de validation
            [
                'auteur_id' => $userIds[0],
                'validateur_id' => $validateurId,
                'covoiturage_id' => $covoiturageIds[min(3, count($covoiturageIds) - 1)],
                'concerne_id' => $userIds[min(1, count($userIds) - 1)],
                'note' => 5,
                'commentaire' => 'Super trajet, merci beaucoup !',
                'statut_valide' => false,
                'date_validation' => now(),
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ],
            [
                'auteur_id' => $userIds[min(1, count($userIds) - 1)],
                'validateur_id' => $validateurId,
                'covoiturage_id' => $covoiturageIds[min(3, count($covoiturageIds) - 1)],
                'concerne_id' => $userIds[0],
                'note' => 4,
                'commentaire' => 'Très bien, passager à l\'heure.',
                'statut_valide' => false,
                'date_validation' => now(),
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ],

            // Avis négatif validé
            [
                'auteur_id' => $userIds[0],
                'validateur_id' => $validateurId,
                'covoiturage_id' => $covoiturageIds[min(4, count($covoiturageIds) - 1)],
                'concerne_id' => $userIds[min(3, count($userIds) - 1)],
                'note' => 2,
                'commentaire' => '30 minutes de retard sans prévenir. Conduite un peu rapide.',
                'statut_valide' => true,
                'date_validation' => now()->subDays(10),
                'created_at' => now()->subDays(11),
                'updated_at' => now()->subDays(10),
            ],

            // Avis sans commentaire
            [
                'auteur_id' => $userIds[min(2, count($userIds) - 1)],
                'validateur_id' => $validateurId,
                'covoiturage_id' => $covoiturageIds[0],
                'concerne_id' => $userIds[0],
                'note' => 4,
                'commentaire' => null,
                'statut_valide' => true,
                'date_validation' => now()->subDays(2),
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(2),
            ],
        ]);
    }
}