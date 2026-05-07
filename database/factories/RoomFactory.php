<?php

namespace Database\Factories;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Room>
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
            'room_number' => fake()->unique()->bothify('A##'),
            'type' => fake()->randomElement(['Standard','Deluxe','Suite']),
            'price' => fake()->numberBetween(300000, 1500000),
            'capacity' => fake()->numberBetween(1, 5),
            'facilities' => implode(', ', fake()->randomElements(['AC','TV','Wifi','Breakfast','Bathtub','Mini Bar','Netflix','Balcony','Swimming Pool',], rand(3, 6))),
            'hotel_id' => Hotel::inRandomOrder()->first()->id,
        ];
    }
}
