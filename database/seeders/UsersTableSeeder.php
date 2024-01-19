<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'lastname' => 'apellido',
            'phone' => '123456789',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Doctor User',
            'lastname' => 'apellido',
            'phone' => '123456789',
            'email' => 'doctor@example.com',
            'password' => Hash::make('password'),
            'role' => 'doctor',
        ]);

        User::create([
            'name' => 'Patient User',
            'lastname' => 'apellido',
            'phone' => '123456789',
            'email' => 'patient@example.com',
            'password' => Hash::make('password'),
            'role' => 'patient',
        ]);
    }
}
