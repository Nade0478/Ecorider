<?php

namespace Database\Seeders;

use App\Models\Administrateur;
use App\Models\Preference;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ConfigurationSeeder::class,
            UserSeeder::class,
            AdministrateurSeeder::class,
            EmployeSeeder::class,
            VehiculeSeeder::class,
            CovoiturageSeeder::class,
            ParticipationSeeder::class,
            PreferenceSeeder::class,
            AvisSeeder::class,
        ]);
    }
}
