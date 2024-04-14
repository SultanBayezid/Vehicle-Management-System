<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transmission;

class TransmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $transmissions = [
            ['name' => 'Manual'],
            ['name' => 'Automatic'],
            ['name' => 'Continuously Variable Transmission (CVT)'],
            ['name' => 'Dual-Clutch Transmission (DCT)'],
            ['name' => 'Automated Manual Transmission (AMT)'],
            ['name' => 'Semi-Automatic Transmission'],
            ['name' => 'Direct-Shift Gearbox (DSG)'],
            ['name' => 'Tiptronic Transmission'],
            ['name' => 'Sequential Manual Transmission (SMT)'],
            ['name' => 'Electronically Controlled Continuously Variable Transmission (ECVT)'],
            ['name' => 'Other transmission'],
        ];

        Transmission::insert($transmissions);
    }
}
