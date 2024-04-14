<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DriveType;
class DriveTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $driveTypes = [
            ['name' => 'Front Wheel Drive'],
            ['name' => 'Rear Wheel Drive'],
            ['name' => 'All Wheel Drive'],
            ['name' => 'Four Wheel Drive'],
            // Add more drive types as needed
        ];

        DriveType::insert($driveTypes);
    }
}
