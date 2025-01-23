<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '123-456-7890',
            'address' => '123 Main Street',
            'about' => 'A contact associated with the admin.',
            'profession' => 'Engineer',
            'user_id' => '1',
        ]);

        Contact::create([
            'name' => 'Jane Smith',
            'email' => 'janesmith@example.com',
            'phone' => '987-654-3210',
            'address' => '456 Elm Street',
            'about' => 'Another contact associated with the admin.',
            'profession' => 'Doctor',
            'user_id' => '1',
        ]);
    }
}
