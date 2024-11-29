<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        /**
         * Run the database seeds.
         */
        Booking::factory(5)->create();
    }
}
