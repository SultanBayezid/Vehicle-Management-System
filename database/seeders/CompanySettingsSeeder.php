<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CompanySetting; // Make sure to import your User model

class CompanySettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            [
                'name' => 'company_name',
                'value' => 'Vehicle Management System',
                'company_id' => 1,
            ],
            [
                'name' => 'phone',
                'value' => '+1 555 123 4567',
                'company_id' => 1,
            ],
            [
                'name' => 'email',
                'value' => 'info@example.com',
                'company_id' => 1,
            ],
            [
                'name' => 'currency',
                'value' => 'BDT',
                'company_id' => 1,
            ],
            [
                'name' => 'vat_id',
                'value' => '',
                'company_id' => 1,
            ],
            [
                'name' => 'language',
                'value' => 'English',
                'company_id' => 1,
            ],
            [
                'name' => 'backend_direction',
                'value' => 'ltr',
                'company_id' => 1,
            ],
            [
                'name' => 'address',
                'value' => 'Address',
                'company_id' => 1,
            ],
        ];

        // Seed data for company_settings table
        foreach ($data as $setting) {
            CompanySetting::create($setting);
        }
    }
}
