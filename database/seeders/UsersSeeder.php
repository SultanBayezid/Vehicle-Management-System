<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Make sure to import your User model
use Str;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Seed data for users table
        $data = [
            [
                'name' => 'John Doe',
                'email' => 'admin@example.com',
                'phone' => '+1 555 123 4567',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'user_type' => 'admin',
                'status' => 1,
                'language' => 'en',
                'company_id' => null,
                'profile_picture' => null,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more seed data as needed
        ];

        // Insert seed data into the users table
        foreach ($data as $user) {
            User::create($user);
        }
    }
}
