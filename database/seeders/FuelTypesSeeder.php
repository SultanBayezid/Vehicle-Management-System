<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FuelType;

class FuelTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $fuelTypes = [
            ['name' => 'Diesel'],
            ['name' => 'Petrol'],
            ['name' => 'CNG'],
            ['name' => 'Hybrid'],
            ['name' => 'Electric'],
            ['name' => 'Octane'],
            ['name' => 'LPG'],
            ['name' => 'Other fuel type'],
            // Add more fuel types as needed
        ];

        FuelType::insert($fuelTypes);
    }

}
