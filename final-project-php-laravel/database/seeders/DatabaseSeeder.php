<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        /**
         * Run the database seeds.
         */
        $this->call(FacilitySeeder::class);
        $this->call(HotelSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(BookingSeeder::class);
        $this->call(FacilityHotelSeeder::class);
        $this->call(FacilityRoomSeeder::class);
    }
}
