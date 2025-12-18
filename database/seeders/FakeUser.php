<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class FakeUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $username = 'test' . str_pad($i, 3, '0', STR_PAD_LEFT);
            $email = $username . '@example.com';

            // Create user
            $user = User::create([
                'name' => $username,
                'email' => $email,
                'password' => Hash::make('password123'), // default password
            ]);

        }

        $this->command->info('100 test users and user activities seeded successfully!');
    }
}
