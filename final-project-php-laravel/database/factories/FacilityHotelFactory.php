<?php

namespace Database\Factories;

use App\Models\Facility;
use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\FacilityHotel>
 */
class FacilityHotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'facility_id' => Facility::inRandomOrder()->first()->getKey(),
            'hotel_id' => Hotel::inRandomOrder()->first()->getKey(),
        ];
    }
}
