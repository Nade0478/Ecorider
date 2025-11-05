<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer un utilisateur admin
        User::create([
            'pseudo' => 'admin',
            'telephone' => '+33612345678',
            'adresse' => '123 Rue de Paris, 75001 Paris',
            'photo' => 'photos/chauffeur1.jpg',
            'credits' => 100,
            'statut_chauffeur' => 'active',
            'statut_passager' => 'active',
            'statut_suspendu' => false,
            'statut_inscription' => 'valide',
            'date_inscription' => now(),
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        // Créer quelques utilisateurs chauffeurs
        User::create([
            'pseudo' => 'chauffeur1',
            'telephone' => '+33623456789',
            'adresse' => '45 Avenue des Champs-Élysées, 75008 Paris',
            'photo' => 'photos/chauffeur1.jpg',
            'credits' => 50,
            'statut_chauffeur' => 'active',
            'statut_passager' => 'active',
            'statut_suspendu' => false,
            'statut_inscription' => 'valide',
            'date_inscription' => now()->subDays(30),
            'email' => 'chauffeur1@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        User::create([
            'pseudo' => 'chauffeur2',
            'telephone' => '+33634567890',
            'adresse' => '78 Rue de Rivoli, 75004 Paris',
            'photo' => 'photos/chauffeur1.jpg',
            'credits' => 75,
            'statut_chauffeur' => 'active',
            'statut_passager' => 'inactive',
            'statut_suspendu' => false,
            'statut_inscription' => 'valide',
            'date_inscription' => now()->subDays(60),
            'email' => 'chauffeur2@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        // Créer quelques utilisateurs passagers
        User::create([
            'pseudo' => 'passager1',
            'telephone' => '+33645678901',
            'adresse' => '12 Boulevard Saint-Germain, 75005 Paris',
            'photo' => 'photos/chauffeur1.jpg',
            'credits' => 25,
            'statut_chauffeur' => 'inactive',
            'statut_passager' => 'active',
            'statut_suspendu' => false,
            'statut_inscription' => 'valide',
            'date_inscription' => now()->subDays(15),
            'email' => 'passager1@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        User::create([
            'pseudo' => 'passager2',
            'telephone' => '+33656789012',
            'adresse' => '34 Rue du Faubourg Saint-Honoré, 75008 Paris',
            'photo' => 'photos/chauffeur1.jpg',
            'credits' => 10,
            'statut_chauffeur' => 'inactive',
            'statut_passager' => 'active',
            'statut_suspendu' => false,
            'statut_inscription' => 'valide',
            'date_inscription' => now()->subDays(5),
            'email' => 'passager2@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        // Créer un utilisateur suspendu
        User::create([
            'pseudo' => 'suspendu',
            'telephone' => '+33667890123',
            'adresse' => '56 Rue de la République, 69002 Lyon',
            'photo' => 'photos/chauffeur1.jpg',
            'credits' => 0,
            'statut_chauffeur' => 'inactive',
            'statut_passager' => 'inactive',
            'statut_suspendu' => true,
            'statut_inscription' => 'valide',
            'date_inscription' => now()->subDays(90),
            'email' => 'suspendu@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);
    }
}