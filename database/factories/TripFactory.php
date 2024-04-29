<?php

// database/factories/TripFactory.php

namespace Database\Factories;

use App\Models\Trip;
use Illuminate\Database\Eloquent\Factories\Factory;

class TripFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trip::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => $this->faker->numberBetween(1, 10), // Random customer ID between 1 and 10
            'driver_id' => $this->faker->numberBetween(1, 5), // Random driver ID between 1 and 5
            'vehicle_id' => $this->faker->numberBetween(1, 10), // Random vehicle ID between 1 and 10
            'pickup_location' => $this->faker->city,
            'dropoff_location' => $this->faker->city,
            'fare_amount' => $this->faker->randomFloat(2, 10, 500),
            'trip_date' => $this->faker->dateTimeBetween('2024-01-01', '2024-12-31')->format('Y-m-d'),
            'departure_time' => $this->faker->time(),
            'arrival_time' => $this->faker->time(),
            'distance_km' => $this->faker->numberBetween(5, 100),
            'status' => $this->faker->randomElement([0, 1, 2]), // Assuming status can be 0, 1, or 2
            'trip_notes' => $this->faker->paragraph,
            'company_id' => 3, // Assuming you have a default company ID
        ];
    }
}
