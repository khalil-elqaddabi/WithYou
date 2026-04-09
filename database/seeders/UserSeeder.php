<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('admin.123'),
            'role' => 'admin',
        ]);

        // Teacher
        User::create([
            'name' => 'Teacher',
            'email' => 'teacher@gmail.com',
            'password' => Hash::make('teacher.123'),
            'role' => 'teacher',
        ]);
    }
}
