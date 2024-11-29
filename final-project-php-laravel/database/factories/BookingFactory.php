<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Room;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'room_id' => Room::inRandomOrder()->first()->getKey(),   //Room::factory(),
            'user_id' => User::inRandomOrder()->first()->getKey(),  //User::factory(),
            'started_at' => $this->faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
            'finished_at' => $this->faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
            'days' => $this->faker->numberBetween(18, 60),
            'price' => $this->faker->randomFloat(2, 1, 500),
        ];
    }
}
