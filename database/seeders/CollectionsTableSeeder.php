<?php

namespace Database\Seeders;

use App\Models\Collection;
use Illuminate\Database\Seeder;

class CollectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Collection::create([
            'user_id' => 1,
            'type' => 'organico',
            'status' => 'realizada',
            'scheduled_date' => now()->subDays(3),
            'weight' => 3.5,
            'points_earned' => 35,
            'location' => 'AK 57R | 54 BIS SUR'
        ]);

        Collection::create([
            'user_id' => 1,
            'type' => 'peligroso',
            'status' => 'pendiente',
            'scheduled_date' => now()->addDays(7),
            'weight' => null,
            'points_earned' => 0,
            'location' => 'AK 57R | 54 BIS SUR'
        ]);

        Collection::create([
            'user_id' => 2,
            'type' => 'inorganico',
            'status' => 'confirmada',
            'scheduled_date' => now()->addDays(1),
            'weight' => 2.0,
            'points_earned' => 20,
            'location' => 'AK 57R | 54 BIS SUR'
        ]);
    }
}
