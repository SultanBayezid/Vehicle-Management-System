<?php

namespace Database\Factories;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Vehicle::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'make' => $this->faker->word,
            'model' => $this->faker->word,
            'year' => $this->faker->numberBetween(2000, 2022),
            'vin' => $this->faker->ean13,
            'color' => $this->faker->colorName,
            'mileage' => $this->faker->numberBetween(1000, 100000),
            'license_plate' => $this->faker->bothify('?? ####'),
            'engine_number' => $this->faker->word,
            'chassis_number' => $this->faker->word,
            'seating_capacity' => $this->faker->numberBetween(2, 8),
            'weight' => $this->faker->randomFloat(2, 1000, 5000),
            'horsepower' => $this->faker->numberBetween(100, 500),
            'purchase_date' => $this->faker->date,
            'purchase_price' => $this->faker->randomFloat(2, 10000, 50000),
            'last_service_date' => $this->faker->date,
            'odometer_reading' => $this->faker->numberBetween(1000, 50000),
            'company_id' => 1, // Assuming you have 10 companies
        ];
    }
}
