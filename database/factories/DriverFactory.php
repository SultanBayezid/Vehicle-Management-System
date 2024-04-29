<?php

namespace Database\Factories;

use App\Models\Driver;
use Illuminate\Database\Eloquent\Factories\Factory;

class DriverFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Driver::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'driver_name' => $this->faker->name,
            'driver_phone_number' => $this->faker->phoneNumber,
            'license_number' => $this->faker->numberBetween(100000, 999999), // Assuming a 6-digit license number
            'license_expiry_date' => $this->faker->dateTimeBetween('+1 month', '+5 years')->format('Y-m-d'),
            'date_of_birth' => $this->faker->dateTimeBetween('-80 years', '-18 years')->format('Y-m-d'), // Assuming drivers are between 18 and 80 years old
            'address' => $this->faker->address,
            'company_id' => 3, // Assuming you have 10 companies and want to assign this driver to the first company
        ];
    }
}
