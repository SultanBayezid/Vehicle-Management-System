<?php

namespace Database\Factories;

use App\Models\Issue;
use Illuminate\Database\Eloquent\Factories\Factory;

class IssueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Issue::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'vehicle_id' => rand(1, 10), // Random vehicle ID between 1 and 10
            'driver_id' => function () {
                return rand(1, 100); // Assuming you have drivers with IDs from 1 to 100
            },
            'summary' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'priority' => $this->faker->randomElement(['high', 'medium', 'low']),
            'image' => $this->faker->imageUrl(),
            'due_date' => $this->faker->dateTimeBetween('2024-01-01', '2024-12-31')->format('Y-m-d'),
            'report_date' => $this->faker->dateTimeBetween('2024-01-01', '2024-12-31')->format('Y-m-d'),
            'status' => $this->faker->randomElement([0, 1, 2]), // Assuming status can be 0, 1, or 2
            'company_id' => 3, // Assuming you have a default company ID
        ];
    }
}
