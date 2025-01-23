<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'title' => 'About Admin User',
            'details' => 'This is the admin user. They manage the platform and have full access to all features.',
            'user_id' => '1',
        ]);
    }
}
