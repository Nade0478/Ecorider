<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employes')->insert([
            [
                'pseudo' => 'employe1',
                'email' => 'employe1@example.com',
                'password' => Hash::make('password'),
                'statut_suspendu' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pseudo' => 'employe2',
                'email' => 'employe2@example.com',
                'password' => Hash::make('password'),
                'statut_suspendu' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pseudo' => 'employe3',
                'email' => 'employe3@example.com',
                'password' => Hash::make('password'),
                'statut_suspendu' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pseudo' => 'employe_suspendu',
                'email' => 'suspendu@example.com',
                'password' => Hash::make('password'),
                'statut_suspendu' => true,
                'created_at' => now()->subDays(60),
                'updated_at' => now(),
            ],
        ]);
    }
}