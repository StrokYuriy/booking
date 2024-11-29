<?php

namespace Database\Seeders;

use App\Models\FacilityHotel;
use Illuminate\Database\Seeder;

class FacilityHotelSeeder extends Seeder
{
    public function run(): void
    {
        /**
         * Run the database seeds.
         */
        FacilityHotel::factory(2)->create();
    }
}
