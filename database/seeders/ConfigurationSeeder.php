<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('configurations')->insert([
            [
                'credits_total' => 100,
                'credits_inscription' => 20,
                'date_derniere_maj' => now(),
                'commission_trajet' => 2.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}