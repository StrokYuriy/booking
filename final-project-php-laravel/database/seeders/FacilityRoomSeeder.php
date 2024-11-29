<?php

namespace Database\Seeders;

use App\Models\FacilityRoom;
use Illuminate\Database\Seeder;

class FacilityRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FacilityRoom::factory(5)->create();
    }
}
