<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::create([
            'name' => 'Test Student',
            'student_number' => '2021-12345',
            'email' => 'student@test.com',
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        User::create([
            'name' => 'Test Employee',
            'email' => 'employee@test.com',
            'password' => Hash::make('password'),
            'role' => 'employee',
        ]);

        User::create([
            'name' => 'Manager User',
            'email' => 'manager@test.com',
            'password' => Hash::make('password'),
            'role' => 'manager',
        ]);

        User::create([
            'name' => 'System Admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Test Alumni',
            'email' => 'alumni@test.com',
            'password' => Hash::make('password'),
            'role' => 'alumni',
        ]);


    }
}

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'email' => 'admin@university.edu',
            'password' => Hash::make('password123'),
        ]);
    }
}
