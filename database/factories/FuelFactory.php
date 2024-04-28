<?php

// database/factories/FuelFactory.php

namespace Database\Factories;

use App\Models\Fuel;
use Illuminate\Database\Eloquent\Factories\Factory;

class FuelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fuel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'vehicle_id' => $this->faker->numberBetween(1, 10), // Random vehicle ID between 1 and 10
            'date' => $this->faker->date(),
            'odometer' => $this->faker->randomNumber(5),
            'qty' => $this->faker->randomNumber(2),
            'reference' => $this->faker->word,
            'attachment' => $this->faker->word,
            'note' => $this->faker->paragraph,
            'company_id' => 2, // Assuming you have a default company I
        ];
    }
}
