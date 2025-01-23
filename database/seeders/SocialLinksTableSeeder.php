<?php

namespace Database\Seeders;

use App\Models\SocialLink;
use Illuminate\Database\Seeder;

class SocialLinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SocialLink::create([
            'twitterLink' => 'https://twitter.com/adminuser',
            'githubLink' => 'https://github.com/adminuser',
            'linkedinLink' => 'https://linkedin.com/in/adminuser',
            'user_id' => '1',
        ]);
        SocialLink::create([
            'twitterLink' => 'https://twitter.com/regularuser',
            'githubLink' => 'https://github.com/regularuser',
            'linkedinLink' => 'https://linkedin.com/in/regularuser',
            'user_id' => '2',
        ]);
    }
}
