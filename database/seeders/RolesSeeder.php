<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);
        Role::firstOrCreate([
            'name' => 'user',
            'guard_name' => 'web'
        ]);

    }
}
