<?php

namespace Database\Seeders;

use App\Models\UserProfile;
use Illuminate\Database\Seeder;

class UserProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserProfile::create([
            'name' => 'Admin', // Matches the name in users table
            'phone' => '123-456-7890',
            'email' => 'jahidhasan370919@gmail.com',
            'present_address' => '123 Admin Street',
            'permanent_address' => '456 Permanent Street',
            'about' => 'This is the admin user profile.',
            'image' => 'admin.jpg',
            'user_id' => 1, // Matches the id in users table
        ]);

        UserProfile::create([
            'name' => 'Regular', // Matches the name in users table
            'phone' => '987-654-3210',
            'email' => 'user@example.com',
            'present_address' => '789 User Lane',
            'permanent_address' => null,
            'about' => 'This is a regular user profile.',
            'image' => 'user.jpg',
            'user_id' => 2, // Matches the id in users table
        ]);

    }
}
