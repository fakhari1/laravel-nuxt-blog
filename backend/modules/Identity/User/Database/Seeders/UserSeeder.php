<?php

namespace Modules\Identity\User\Database\Seeders;

use Modules\Identity\User\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'admin',
            'last_name' => 'test',
            'mobile' => '09123456789',
            'password' => Hash::make('09123456789'),
        ]);

        User::factory()
            ->count(50)
            ->state(['password' => Hash::make('password')])
            ->create();
    }
}
