<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Year;
class YearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Generate an array of years (e.g., from 2000 to 2022)
        $years = range(1970, 2024);

        // Insert each year into the database
        foreach ($years as $year) {
            Year::create(['year' => $year]);
        }
    }
}
