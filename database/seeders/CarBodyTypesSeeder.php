<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CarBodyType; // Make sure to import your User model

class CarBodyTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            ['name' => 'Saloon'],
            ['name' => 'Hatchback'],
            ['name' => 'Estate'],
            ['name' => 'Convertible'],
            ['name' => 'Coupe/Sports'],
            ['name' => 'SUV / 4x4'],
            ['name' => 'MPV'],
            ['name' => 'Pickup Truck'],
            ['name' => 'Van'],
            ['name' => 'Roadster'],
            ['name' => 'Crossover'],
            ['name' => 'Limousine'],
            ['name' => 'Microcar'],
            ['name' => 'Minivan'],
            ['name' => 'Electric Vehicle (EV)'],
            ['name' => 'Hybrid'],
            // Add more seed data as needed
        ];
    
        // Insert seed data into the car_body_types table
        foreach ($data as $bodyType) {
            CarBodyType::create($bodyType);
        }
    }
    
}
