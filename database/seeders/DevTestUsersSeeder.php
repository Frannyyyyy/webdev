<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DevTestUsersSeeder extends Seeder
{
    public function run()
    {
        // STUDENT
        User::updateOrCreate(
            ['email' => 'student@test.com'],
            [
                'name' => 'Test Student',
                'password' => Hash::make('password123'),
                'role' => 'student',
            ]
        );

        // EMPLOYEE
        User::updateOrCreate(
            ['email' => 'employee@test.com'],
            [
                'name' => 'Test Employee',
                'password' => Hash::make('password123'),
                'role' => 'employee',
            ]
        );

        // MANAGER
        User::updateOrCreate(
            ['email' => 'manager@test.com'],
            [
                'name' => 'Test Manager',
                'password' => Hash::make('password123'),
                'role' => 'manager',
            ]
        );

        // ADMIN
        User::updateOrCreate(
            ['email' => 'admin@test.com'],
            [
                'name' => 'Test Admin',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );

        // ALUMNI
        User::updateOrCreate(
            ['email' => 'alumni@test.com'],
            [
                'name' => 'Test Alumni',
                'password' => Hash::make('password123'),
                'role' => 'alumni',
            ]
        );

        $this->command->info('✅ Dev test users created!');
    }
}
