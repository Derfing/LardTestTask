<?php

namespace Database\Seeders;

use App\Models\Contractor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContractorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 25; $i++) {
            Contractor::create(
                [
                    'name' => 'Contractor ' . ($i + 1),
                    'inn' => fake()->numerify('##########'),
                    'email' => fake()->email,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
