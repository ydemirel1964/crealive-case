<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUser = User::firstOrCreate([
            'name' => 'Admin',
            'email' => 'ydemirel1964@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $adminUser->assignRole('admin');

    }
}
