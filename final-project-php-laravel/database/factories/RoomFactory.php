<?php

namespace Database\Factories;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->text(),
            'poster_url' => $this->faker->image(storage_path('images'), 40, 40, 'rooms', false),
            'floor_area' => $this->faker->randomNumber(5, true),
            'type' => $this->faker->sentence(5),
            'price' => $this->faker->randomFloat(2, 1, 500),
            'hotel_id' => Hotel::inRandomOrder()->first()->getKey(),
        ];
    }
}
