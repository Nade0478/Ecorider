<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupérer des IDs d'utilisateurs existants
        $userIds = DB::table('users')->pluck('id')->toArray();

        if (empty($userIds)) {
            $this->command->warn('Aucun utilisateur trouvé. Assurez-vous d\'exécuter UserSeeder en premier.');
            return;
        }

        $preferences = [];

        // Préférences pour le premier utilisateur
        if (isset($userIds[0])) {
            $preferences = array_merge($preferences, [
                [
                    'user_id' => $userIds[0],
                    'propriete' => 'notification_email',
                    'valeur' => 'true',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => $userIds[0],
                    'propriete' => 'notification_sms',
                    'valeur' => 'false',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => $userIds[0],
                    'propriete' => 'accepte_animaux',
                    'valeur' => 'true',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => $userIds[0],
                    'propriete' => 'accepte_fumeur',
                    'valeur' => 'false',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => $userIds[0],
                    'propriete' => 'preference_musique',
                    'valeur' => 'toute',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => $userIds[0],
                    'propriete' => 'niveau_discussion',
                    'valeur' => 'moyen',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }

        // Préférences pour le deuxième utilisateur
        if (isset($userIds[1])) {
            $preferences = array_merge($preferences, [
                [
                    'user_id' => $userIds[1],
                    'propriete' => 'notification_email',
                    'valeur' => 'true',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => $userIds[1],
                    'propriete' => 'notification_sms',
                    'valeur' => 'true',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => $userIds[1],
                    'propriete' => 'accepte_animaux',
                    'valeur' => 'false',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => $userIds[1],
                    'propriete' => 'accepte_fumeur',
                    'valeur' => 'false',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => $userIds[1],
                    'propriete' => 'preference_musique',
                    'valeur' => 'calme',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => $userIds[1],
                    'propriete' => 'niveau_discussion',
                    'valeur' => 'faible',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => $userIds[1],
                    'propriete' => 'preference_temperature',
                    'valeur' => 'chaud',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }

        // Préférences pour le troisième utilisateur
        if (isset($userIds[2])) {
            $preferences = array_merge($preferences, [
                [
                    'user_id' => $userIds[2],
                    'propriete' => 'notification_email',
                    'valeur' => 'false',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => $userIds[2],
                    'propriete' => 'notification_sms',
                    'valeur' => 'true',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => $userIds[2],
                    'propriete' => 'accepte_animaux',
                    'valeur' => 'true',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => $userIds[2],
                    'propriete' => 'accepte_fumeur',
                    'valeur' => 'true',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => $userIds[2],
                    'propriete' => 'preference_musique',
                    'valeur' => 'aucune',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => $userIds[2],
                    'propriete' => 'niveau_discussion',
                    'valeur' => 'eleve',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => $userIds[2],
                    'propriete' => 'arrets_intermediaires',
                    'valeur' => 'true',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }

        // Préférences pour le quatrième utilisateur
        if (isset($userIds[3])) {
            $preferences = array_merge($preferences, [
                [
                    'user_id' => $userIds[3],
                    'propriete' => 'notification_email',
                    'valeur' => 'true',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => $userIds[3],
                    'propriete' => 'accepte_animaux',
                    'valeur' => 'false',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => $userIds[3],
                    'propriete' => 'preference_musique',
                    'valeur' => 'variee',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'user_id' => $userIds[3],
                    'propriete' => 'bagage_autorise',
                    'valeur' => 'petit',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }

        DB::table('preferences')->insert($preferences);
    }
}