<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CarBodyTypesSeeder::class);
        $this->call(CompanySettingsSeeder::class);
        $this->call(SettingsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(FuelTypesSeeder::class);
        $this->call(TransmissionSeeder::class);
        $this->call(DriveTypesTableSeeder::class);
        $this->call(YearsTableSeeder::class);
        $this->call(CarBrandsSeeder::class);
        $this->call(CarModelsSeeder::class);
        

    }
}
