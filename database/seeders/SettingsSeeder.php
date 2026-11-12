<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting; // Make sure to import your User model

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            [
                'name' => 'mail_type',
                'value' => 'mail',
            ],
            [
                'name' => 'backend_direction',
                'value' => 'ltr',
                'updated_at' => '2023-09-24 06:12:49',
            ],
            [
                'name' => 'membership_system',
                'value' => 'enabled',
            ],
            [
                'name' => 'trial_period',
                'value' => '7',
            ],
            [
                'name' => 'monthly_cost',
                'value' => '10',
            ],
            [
                'name' => 'yearly_cost',
                'value' => '99',
            ],
            [
                'name' => 'allow_singup',
                'value' => 'yes',
                'updated_at' => '2023-09-24 06:12:49',
            ],
            [
                'name' => 'company_name',
                'value' => 'Vehicle Management System',
                'created_at' => '2023-09-24 00:11:02',
                'updated_at' => '2023-09-24 01:12:21',
            ],
            [
                'name' => 'site_title',
                'value' => 'Vehicle Management System',
                'created_at' => '2023-09-24 01:12:21',
                'updated_at' => '2023-09-24 01:12:21',
            ],
            // Add more seed data as needed
        ];

        // Insert seed data into the settings table
        foreach ($data as $setting) {
            Setting::create($setting);
        }
    }
}
