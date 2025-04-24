<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
        ]);

        $admin->assignRole('admin');

        User::create([
            'name' => 'bilal',
            'email' => 'bilal@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        User::create([
            'name' => 'furqan',
            'email' => 'furqan@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        User::create([
            'name' => 'hamza',
            'email' => 'hamza@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
    }

}
