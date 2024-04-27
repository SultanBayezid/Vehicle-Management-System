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
        'brand_id' => 103,
            'model_id' => 1366,
            'manufacture_year' => $this->faker->numberBetween(1990, 2022),
            'register_year' => $this->faker->numberBetween(1990, 2022),
            'transmission_id' => 3,
            'body_type_id' => 4,
            'drive_type_id' => 3,
            'driver_id' => null,
            'company_id' => 1, // Assuming you have a default company ID
            'mileage' => $this->faker->numberBetween(1000, 100000),
            'in_color' => $this->faker->colorName,
            'ex_color' => $this->faker->colorName,
            'license_plate' => $this->faker->unique()->bothify('??####'),
            'engine_number' => $this->faker->word,
            'chassis_number' => $this->faker->word,
            'seating_capacity' => $this->faker->numberBetween(2, 8),
            'weight' => $this->faker->numberBetween(1000, 5000),
            'engine_capacity' => null, // Add logic if required
            'purchase_date' => $this->faker->date,
            'purchase_price' => $this->faker->randomFloat(2, 10000, 50000),
            'supplier_name' => $this->faker->name,
            'supplier_phone' => $this->faker->phoneNumber,
            'purchase_note' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'price_per_km' => $this->faker->randomFloat(2, 10, 100),
            'price_per_day' => $this->faker->randomFloat(2, 50, 200),
            'status' => $this->faker->randomElement([0, 1]), // Random status
            'company_id' => 2, // Assuming you have 10 companies
        ];
    }
}
